<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\admin\Departement;
use App\Models\admin\AcademicLevel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index(){
        
        if(Auth::user()->hasRole('administrator')){
            $staffs = User::whereRoleIs('lecturer')->get();
            $departements = Departement::all(); 
            $levels = AcademicLevel::all();
        return view('admin.students', ['staffs'=> $staffs, 'departements'=> $departements, 'levels' => $levels]);
        }
        if(Auth::user()->hasRole('hod')){
         $departements = Departement::where(['id'=> auth()->user()->departement_id]); 
         $staffs = User::where(['departement_id'=> auth()->user()->departement_id ])->whereRoleIs('lecturer')->get();
         $departements = Departement::all(); 

         $levels  = AcademicLevel::all();

            return view('hod.students', ['staffs'=> $staffs, 'departements'=> $departements, 'levels'=> $levels]);
        }
    }

    public function generalList(){
        // $staffs = [];
        if(Auth::user()->hasRole('administrator')){
          $staffs= User::whereRoleIs('user')->get();
        }

        if(Auth::user()->hasRole('hod')){
          $staffs= User::where(['departement_id'=> auth()->user()->departement_id ])->whereRoleIs('user')->get();
        }

        if(Auth::user()->hasRole('hof')){
            $staffs= User::join('departements','users.departement_id','=','departements.id')
                    ->join('schools','departements.school_id','=','schools.id')->whereRoleIs('user')
                    ->select('*','users.id as user_id','departements.name as dept_name', 'schools.name as school_name')->get();
          }
        return response()->json(['staffs' => $staffs], 200);


    }

    public function show($id)
    {
        $staffs = User::find($id);
        $levels = AcademicLevel::all();
        if(!$staffs){
            return response()->json(['message'=>'Not found'],404);
        }
        return response()->json(['staff'=>$staffs, 'levels'=>$levels]);
    }

    public function create(Request $request)
    {
        // $request->validate([
        //     'first_name' => 'required|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'role_id' => 'required',
        //     'staffCode' => 'required|max:255|unique:users',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        $staffs = new User();
        $model = null;
        $staffs->first_name = $request->input('first_name');
        $staffs->last_name = $request->input('last_name');
        $staffs->gender = $request->input('gender');
        $staffs->email = $request->input('email');
        $staffs->level_id = $request->input('level_id');
        $staffs->staffCode = $request->input('staffCode');
        $staffs->password = Hash::make('12345678');
        $staffs->status = true;
        // if($request->leader_assign != 2 OR  $request->leader_assign != 1){
        $staffs->departement_id = $request->input('departement_id');

        // }
        try {

        // $user = User::create([
        //     'first_name' => $request->input('first_name'),
        //     'last_name' => $request->input('last_name'),
        //     'gender' => $request->input('gender'),
        //     // 'profile_pic' => $request->profile_pic,
        //     // 'signature' => $request->signature,
        //     'email' => $request->input('email'),
        //     'staffCode' => $request->input('staffCode'),
        //     'role_id' => $request->input('staffRole_id'),
        //     'status' => true,
        //     'completed' => false,
        //     'password' => Hash::make($request->password),
        // ]);


        $staffs->save();

        $staffs->attachRole('user');


        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }

        return response()->json(['result' => "ok"], 200);

    }



    public function update(Request $request)
    {
        $id = $request->input('id');
        $staffs = User::find($id);
        if(!$staffs)
        {
            return response()->json(['result'=>'Invalid Staff'],404);
        }



        $staffs->first_name = $request->input('edit_first_name');
        $staffs->first_name = $request->input('edit_first_name');
        $staffs->email = $request->input('edit_email');
        $staffs->level_id = $request->input('edit_level_id');
        $staffs->gender = $request->input('edit_gender');
        
        // $staffs->college_id = $request->input('college_id');

        try {
            $staffs->save();
        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['result' => "ok"], 200);
    }

    public function changeStatus(Request $request)
    {
        $id = $request->input('id');
        $staffs = User::find($id);
        if(!$staffs)
        {
            return response()->json(['result'=>'Invalid Staff'],404);
        }
        $staffs->status = $request->input('status');

        try {
            $staffs->save();
        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['result' => "ok"], 200);
    }

    public function defendStatus($id){
        $user = User::find($id);
        if(!$user){
            return response()->json(['message'=>'Not found'],404);
        }
        $user->has_defended = !$user->has_defended;
        
        try {
            //code...
            $user->save();
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['ex'=>$th->errorInfo],500);

        }
        return response()->json(['result' => "ok"], 200);


    }

}
