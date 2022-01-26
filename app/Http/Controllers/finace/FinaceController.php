<?php

namespace App\Http\Controllers\finace;

use App\Models\User;
use App\Models\admin\Module;
use Illuminate\Http\Request;
use App\Models\admin\Departement;
use App\Models\admin\AcademicLevel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\student\TranscriptRequest;

class FinaceController extends Controller
{
    public function index(){

    $modules = Module::where(['departement_id'=> auth()->user()->departement_id])->get();
    $students = User::where(['departement_id'=> auth()->user()->departement_id])->whereRoleIs('user')->get();
    $staffs = User::WhereRoleIs('lecturer')->Where(['departement_id'=>auth()->user()->departement_id])->get();
    $trasncript = TranscriptRequest::all();
    
                    

    return view('finace.dashboard', ['modules'=> $modules, 'students'=>$students,'staffs'=> $staffs, 'trasncript' => $trasncript]);   
 }

 public function student(){
        
        if(Auth::user()->hasRole('administrator')){
            $staffs = User::whereRoleIs('lecturer')->get();
            $departements = Departement::all(); 
        return view('admin.students', ['staffs'=> $staffs, 'departements'=> $departements]);
        }
        if(Auth::user()->hasRole('hod')){
         $departements = Departement::where(['id'=> auth()->user()->departement_id]); 
         $staffs = User::where(['departement_id'=> auth()->user()->departement_id ])->whereRoleIs('lecturer')->get();
         $departements = Departement::all(); 
         $levels = AcademicLevel::all();

            return view('hod.students', ['staffs'=> $staffs, 'departements'=> $departements, 'levels'=> $levels,]);
    }

    if(Auth::user()->hasRole('hof')){
        $students = User::whereRoleIs('user')->get();
        $departements = Departement::all(); 
        $levels = AcademicLevel::all();
      return view('finace.students', ['students'=> $students, 'departements'=> $departements, 'levels'=> $levels]);
       
   }
 }

 public function studentList(){
    $students = User::whereRoleIs('user')->get();
 }


 public function transcriptRequest(){
    $requests = TranscriptRequest::join('users','transcript_requests.user_id','=','users.id')
    ->join('departements','users.departement_id','=','departements.id')
    ->join('academic_levels','academic_levels.id','=','transcript_requests.level')
    ->select('*','transcript_requests.id as request_id','departements.name as dept_name','academic_levels.name as level')->get();
    //    dd($requests[0]);
   return view('finace.requests');
}

public function TranscriptRequestList(){
    $requests = TranscriptRequest::join('users','transcript_requests.user_id','=','users.id')
    ->join('departements','users.departement_id','=','departements.id')
    ->join('academic_levels','academic_levels.id','=','transcript_requests.level')
    ->select('*','transcript_requests.id as request_id','departements.name as dept_name','academic_levels.name as level')->get();
    return response()->json(['requests' => $requests], 200);
}

public function studentShow($id){
    $user = User::find($id);
    if(!$user){
        return response()->json(['message'=>'Not found'],404);
    }
    return response()->json(['user'=> $user], 200);
}

public function toogleClearFinace(Request $request){

    $id = $request->input('id');
    $staffs = User::find($id);
    if(!$staffs)
    {
        return response()->json(['result'=>'Invalid Staff'],404);
    }
    $staffs->cleared_finace = $request->input('status');

    try {
        $staffs->save();
    } catch (\Throwable $exception) {
        return response()->json(['ex'=>$exception->errorInfo],500);
    }
    return response()->json(['result' => 'ok'], 200);
    
}

}
