<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\admin\Departement;
use App\Models\admin\AcademicLevel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index(){

        $staffs = User::all();
        $departements = Departement::all();

        if(Auth::user()->hasRole('administrator')){
          return view('admin.staffs', ['staffs'=> $staffs, 'departements'=> $departements]);
        }
        
        if(Auth::user()->hasRole('hod')){

        $staffs = User::where(['departement_id'=> auth()->user()->departement_id])->whereRoleIs('lecturer')->get();
        $departements = Departement::where(['id'=> auth()->user()->departement_id]);

        return view('hod.staffs', ['staffs'=> $staffs, 'departements'=> $departements]);

        }
        
    }

    public function generalList(){
        // $staffs = [];
        $staffs= User::whereRoleIs('lecturer')->get();
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
        $staffs->staffCode = $request->input('staffCode');
        $staffs->password = Hash::make('12345678');
        $staffs->status = true;
        // if($request->leader_assign != 2 OR  $request->leader_assign != 1){
        $staffs->departement_id = $request->input('departement_id');

        // }
        try {

 

        $staffs->save();

        $staffs->attachRole('lecturer');


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

}
