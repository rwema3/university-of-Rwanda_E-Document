<?php

namespace App\Http\Controllers\front;

use PDF;
use Webpatser\Uuid\Uuid;
use App\Models\user\Mark;
use App\Models\admin\Module;
use App\Models\admin\School;
use Illuminate\Http\Request;
use App\Models\admin\College;
use App\Models\admin\Departement;
use App\Models\admin\Destination;
use Illuminate\Support\Facades\DB;
use App\Models\admin\AcademicLevel;
use App\Http\Controllers\Controller;
use App\Models\student\PaymentOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\admin\Transiportation;
use Carbon\Carbon;use App\Models\User;
use Illuminate\Support\Facades\Storage;

use App\Models\student\TranscriptRequest;
use SebastianBergmann\CodeUnit\FunctionUnit;

class FrontController extends Controller
{
   public function index(Request $request)
   {
       $allRequests = TranscriptRequest::where('user_id', auth()->user()->id )->get();
       $clearedRequest = TranscriptRequest::where( ['user_id'=> auth()->user()->id] )->get();
       return view('user.dashboard', ['allRequests'=>$allRequests, 'clearedRequest' => $clearedRequest]);
   }


public function requestForm(){

    $levels = AcademicLevel::get();
    $user = auth()->user();
    // dd($level);
    return view('user.requestForm',['levels'=> $levels, 'user'=>$user]);
}


public function createRequest(Request $request)
{
    $model = new TranscriptRequest();
    $model->level = $request->input('level');
    $model->payment_status = 'UNPAID';
    $model->user_id = auth()->user()->id;

    $model->save();
      return redirect()->route('user.allRequests');

    // try {
    //     $model->save();

    //     return redirect()->route('user.dashboard');

    // } catch (\Throwable $exception) {
    //     return response()->json(['ex'=>$exception->errorInfo],500);
    // }
    // return response()->json(['result' => "ok"], 200);

}

public function allRequests()
{
    $user = auth()->user();
    return view('user.allRequests',['user'=>$user]);
}


public function allStaffRequests(){

        $staffRequests = TranscriptRequest::where('user_id', auth()->user()->id )->get();

        return response()->json(['staffRequests' => $staffRequests], 200);
}

public function request(){
    return view('user.reUuid::generate()->stringquestDetails');
}

public function momoPaymentOrder(Request $request){
    $amount = 3000;
    $uuid = Uuid::generate()->string;
    $model = new PaymentOrder();

    $model->amout = $amount;
    $model->user_id = auth()->user()->id;
    $model->transcript_request_id = $request['id'];
    $model->transaction_id = $uuid;
    $model->status = "PENDING";
  

    $data = [
    "telephoneNumber"=>'25'.$request['telphone'],
    "amount" => $amount,
    "organizationId" => 'bef0fc9b-6adb-4494-b01e-f5009874f3ba',
    "description" => 'Payment for products',
    "callbackUrl" => route('user.pay.callback'),
    "transactionId" => $uuid,
    ];

    $apiURL = 'https://opay-api.oltranz.com/opay/paymentrequest';

    $headers = [
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
    ];


    $response = Http::withHeaders($headers)->post($apiURL, $data);

    $statusCode = $response->status();
    $responseBody = ($response->getBody());
    return $responseBody;

    if($responseBody['code'] == 200){
    $model->save();
    return response()->json(['result' => "ok"], 200);
    }
    else{
    return response()->json(['result' => "error"], 500);

    }
 

}

public function transcript(){
 
    $user_data = array();
    $user_data['student'] = auth()->user();
    $user_data['marks'] = auth()->user();

    $marks_1 = DB::table('marks')
    ->join('users','marks.user_id','=','users.id')
    ->join('modules', 'marks.module_id', '=', 'modules.id')
    ->where(['modules.semester'=>1, 'marks.user_id'=>auth()->user()->id])
    ->select('*','users.id as user_id', 'modules.name as module_name')
    ->get();

    $marks_2 = DB::table('marks')
    ->join('users','marks.user_id','=','users.id')
    ->join('modules', 'marks.module_id', '=', 'modules.id')
    ->where(['modules.semester'=>2, 'marks.user_id'=> auth()->user()->id])
    ->select('*','users.id as user_id', 'modules.name as module_name')
    ->get();

    $academic = Departement::join('schools','departements.school_id','=','schools.id')
                ->join('colleges','schools.college_id','=','colleges.id')
                ->where(['departements.id'=>auth()->user()->departement_id])
                ->select('*', 'departements.name as dpt_name', 'schools.name as school_name', 'colleges.name as college_name')->get()[0];
       
        // dd($academic);

        //   dd($marks_2[0]->module_name);

          // return view('user.transcript', ['data'=>$user_data, 'marks_1'=>$marks_1, 'marks_2'=> $marks_2]);

          // share data to view
          //   view()->share('employee',$data);
        //   dd($marks_1[0]->profile_pic);

          if(isset($marks_1[0]->profile_pic) && $marks_1[0]->profile_pic != ''){
            $path = $marks_1[0]->profile_pic;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents('uploads/images/profiles/'.$path);
            $profile = 'data:image/' . $type . ';base64,' . base64_encode($data);
         
            $error = array();
            $hasMarkError = false;

         foreach($marks_1 as $m){

             if($m->marks < 50){

                //  print_r("you ned to Clear marks in ". $m->module_name);
                 $err = "you ned to Clear marks in ". $m->module_name ;
                array_push($error, $err);
             };
         }

         foreach($marks_2 as $m){
            if($m->marks < 50){
                $err = "you ned to Clear marks in ". $m->module_name;
               array_push($error, $err);
            }
        }

         if(!auth()->user()->cleared_finace){
             array_push($error," You need to clear finace issue");
             dd(auth()->user());
         }

        //  dd(isset($error));


         if(isset($error) && count($error) > 0){
             
           return  redirect()->route('user.allRequests')->with(['errors'=>$error]);
         }
        
         $pdf = PDF::loadView('user.transcript', ['data'=>$user_data,'semester1'=>$marks_1, 'semester2'=>$marks_2, 'profile'=>$profile,'academic'=>$academic]);
      
         // download PDF file with download method
          return $pdf->download('transcript.pdf');

    // return view('user.transcript', ['data'=>$user_data,'semester1'=>$marks_1, 'semester2'=>$marks_2, 'profile' =>$profile,'academic'=>$academic]);

}  

}

public function testimonial(){

    $user = User::join('departements','users.departement_id','=','departements.id')
    ->join('schools','departements.school_id','=','schools.id')
    ->select('*','departements.name as dpt_name', 'schools.name as school_name')
    ->where(['users.id'=> auth()->user()->id])
    ->get()[0];

    $path = $user->profile_pic;
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents('uploads/images/profiles/'.$path);
    $profile = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $error = array();



    return view('user.testimonial',['user'=> $user, 'profile'=>$profile]);
}


public function testimonialDownload(){

    $user = User::join('departements','users.departement_id','=','departements.id')
    ->join('schools','departements.school_id','=','schools.id')
    ->select('*','departements.name as dpt_name', 'schools.name as school_name')
    ->where(['users.id'=> auth()->user()->id])
    ->get()[0];

    $path = $user->profile_pic;
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents('uploads/images/profiles/'.$path);
    $profile = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $error = array();

    if(!$profile || $profile == ''){
        $err = "Complete your profile first i.e : Image is empty";
        array_push($error, $err);

    }


    $user_data = array();
    $user_data['student'] = auth()->user();
    $user_data['marks'] = auth()->user();

    $marks_1 = DB::table('marks')
    ->join('users','marks.user_id','=','users.id')
    ->join('modules', 'marks.module_id', '=', 'modules.id')
    ->where(['modules.semester'=>1, 'marks.user_id'=>auth()->user()->id])
    ->select('*','users.id as user_id', 'modules.name as module_name')
    ->get();

    $marks_2 = DB::table('marks')
    ->join('users','marks.user_id','=','users.id')
    ->join('modules', 'marks.module_id', '=', 'modules.id')
    ->where(['modules.semester'=>2, 'marks.user_id'=> auth()->user()->id])
    ->select('*','users.id as user_id', 'modules.name as module_name')
    ->get();

    foreach($marks_1 as $m){

        if($m->marks < 50){

           //  print_r("you ned to Clear marks in ". $m->module_name);
            $err = "you ned to Clear marks in ". $m->module_name ;
           array_push($error, $err);
        };
    }

    foreach($marks_2 as $m){
       if($m->marks < 50){
           $err = "you ned to Clear marks in ". $m->module_name;
          array_push($error, $err);
       }
   }


    //  dd($profile);
    if($user->has_defended){
         
    $pdf = PDF::loadView('user.testimonial',['user'=> $user, 'profile'=>$profile]);
    return $pdf->download('testimonial.pdf');
    }

    array_push($error," You have not defend yet");

    return  redirect()->route('user.allRequests')->with(['errors'=>$error]);
}



public function toWhom(){

    $user = User::join('departements','users.departement_id','=','departements.id')
    ->join('schools','departements.school_id','=','schools.id')
    ->join('colleges','colleges.id','=','departements.school_id')
    ->select('*','departements.name as dpt_name', 'schools.name as school_name','colleges.name as college_name' , 'schools.id as school_id')
    ->where(['users.id'=> auth()->user()->id])
    ->get()[0];

    // $dean = User::whereRoleIs('')

    $path = $user->profile_pic;
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents('uploads/images/profiles/'.$path);
    $profile = 'data:image/' . $type . ';base64,' . base64_encode($data);
 
    return view('user.toWhom', ['user'=> $user, 'profile'=>$profile]);
}

public function toWhomDownload(){

    $user = User::join('departements','users.departement_id','=','departements.id')
    ->join('schools','departements.school_id','=','schools.id')
    ->join('colleges','colleges.id','=','departements.school_id')
    ->select('*','departements.name as dpt_name', 'schools.name as school_name')
    ->where(['users.id'=> auth()->user()->id])
    ->get()[0];

    $path = $user->profile_pic;
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents('uploads/images/profiles/'.$path);
    $profile = 'data:image/' . $type . ';base64,' . base64_encode($data);

    $error = array();

    $error = array();

    if(!$profile || $profile == ''){
        $err = "Complete your profile first i.e : Image is empty";
        array_push($error, $err);

    }



    $user_data = array();
    $user_data['student'] = auth()->user();
    $user_data['marks'] = auth()->user();

    $marks_1 = DB::table('marks')
    ->join('users','marks.user_id','=','users.id')
    ->join('modules', 'marks.module_id', '=', 'modules.id')
    ->where(['modules.semester'=>1, 'marks.user_id'=>auth()->user()->id])
    ->select('*','users.id as user_id', 'modules.name as module_name')
    ->get();

    $marks_2 = DB::table('marks')
    ->join('users','marks.user_id','=','users.id')
    ->join('modules', 'marks.module_id', '=', 'modules.id')
    ->where(['modules.semester'=>2, 'marks.user_id'=> auth()->user()->id])
    ->select('*','users.id as user_id', 'modules.name as module_name')
    ->get();

    foreach($marks_1 as $m){

        if($m->marks < 50){

           //  print_r("you ned to Clear marks in ". $m->module_name);
            $err = "you ned to Clear marks in ". $m->module_name ;
           array_push($error, $err);
        };
    }

    foreach($marks_2 as $m){
       if($m->marks < 50){
           $err = "you ned to Clear marks in ". $m->module_name;
          array_push($error, $err);
       }
   }


    if($user->has_defended){
    $pdf = PDF::loadView('user.toWhom',['user'=> $user, 'profile'=>$profile]);

    return $pdf->download('toWhom.pdf'); 
    }

    array_push($error," You have not defend yet");

    return  redirect()->route('user.allRequests')->with(['errors'=>$error]);
  

}

public function Account()
{

    return view('user.staffProfile');
}

public function staffProfileData()
{

        $logged = User::find(auth()->user()->id);
        $user['staff'] = User::find(auth()->user()->id);

  return response()->json(['staff'=>$user]);

}

public function updateAccount(Request $request){
    // dd($request->all());

    $model = User::find($request->id);
    if(!$model){
        return response()->json(['message'=>'Not found'],404);
    }

    // return response()->json(['staff'=>$request->all()]);

    $model->staffCode = $request->input('staffCode');
    $model->telphone = $request->input('telphone');
    $model->gender = $request->input('gender');
    $model->first_name = $request->input('first_name');
    $model->last_name = $request->input('last_name');
    $signature = $request->input('signed');

    // Signature
    if($signature){
        //  next

    $image_64 = $signature; //your base64 encoded data

    $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf

    $replace = substr($image_64, 0, strpos($image_64, ',')+1);

  // find substring fro replace here eg: data:image/png;base64,

   $image = str_replace($replace, '', $image_64);

   $image = str_replace(' ', '+', $image);

   $imageName = time().'_'. $model->first_name.'.'.$extension;




   if(Storage::disk('public')->put($imageName, base64_decode($image))){
    $model->signature = $imageName;

     }
    }
    else{
        $model->signature = $model->signature;
    }

    // Profile Picture
    if ($file = $request->file('photo')) {

        //store file into stamps folder
        // $file = $request->file('stamp');
        $name = $file->getClientOriginalName();
        $file->storeAs('uploads/images/stamps', 's3');

        $filename = time().$name;
        $file->move(public_path('uploads/images/profiles'), $filename);
        $model->profile_pic = $filename;


    }

   try {
    $model->save();
    } catch (\Throwable $exception) {
        return response()->json(['ex'=>$exception->errorInfo],500);
    }
    return response()->json(['result' => "ok", 'data' => $model], 200);



}

public function editPassword(){
    return view('user.change_password');
}



// lecturer
public function indexLecturer(){
    // $student = User::Where('departement_id', auth()->user()->departement_id)->get();
    $student = User::whereRoleIs('user')->Where('departement_id', auth()->user()->departement_id)->get();

    
    return view('user.teacher_dashboard', ['student'=>$student]);
}

public function studentMarks(){

    $marks = DB::table('marks')
    ->join('users','marks.user_id','=','users.id')
    ->join('modules','modules.id','=','marks.module_id')
    ->select('*','users.id as user_id')
    ->get();


 $student = User::whereRoleIs('user',)->Where('departement_id', auth()->user()->departement_id)->get();
 return view('user.teacher_student', ['student'=>$student, 'marks'=>$marks]);
}

public function addMarks(){
    $module = Module::all();
    $student = User::whereRoleIs('user',)->Where('departement_id', auth()->user()->departement_id)->get();
  

    $marks = DB::table('marks')
    ->join('users','marks.user_id','=','users.id')
    ->join('modules', 'marks.module_id', '=', 'modules.id')
    ->select('*','users.id as user_id')
    ->get();

    // dd($marks);  


    return view('user.teacher_add_student', ['modules'=>$module, 'students'=> $student, 'marks'=>$marks]);
}



public function createMarks(Request $request){

    $mark = new Mark();
    $mark->marks = $request['marks'];
    $mark->user_id = $request['reg_no'];
    $mark->module_id = $request['module'];
    $mark->save();
    
}


}
