<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\admin\Module;
use Illuminate\Http\Request;
use App\Models\admin\Departement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ModuleController extends Controller
{
    public function index(){


        if(Auth::user()->hasRole('administrator')){
            $staffs = User::whereRoleIs('lecturer')->get();
            $departements = Departement::all(); 
        return view('admin.modules', ['staffs'=> $staffs, 'departements'=> $departements]);
        }
        if(Auth::user()->hasRole('hod')){
         $departements = Departement::where(['id'=> auth()->user()->departement_id])->get(); 
         $staffs = User::where(['departement_id'=> auth()->user()->departement_id ])->whereRoleIs('lecturer')->get();
        
            return view('hod.modules', ['staffs'=> $staffs, 'departements'=> $departements]);
        }

    }

    public function generalList(){
        // $staffs = [];
        $modules = Module::all();
        return response()->json(['modules' => $modules], 200);
    }

    public function show($id)
    {
        $module = Module::find($id);
        if(!$module){
            return response()->json(['message'=>'Not found'],404);
        }
        return response()->json(['module'=>$module]);
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

        $module = new Module();
        $module->name = $request->input('name');
        $module->code = $request->input('code');
        $module->level = $request->input('level');
        $module->semester = $request->input('semester');
        $module->credits = $request->input('credits');
        $module->departement_id = $request->input('departement');
        $module->user_id = $request->input('lecturer');
        $module->status = true;
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


        $module->save();


        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }

        return response()->json(['result' => "ok"], 200);

    }



    public function update(Request $request)
    {
        $id = $request->input('id');
        $module = User::find($id);
        if(!$module)
        {
            return response()->json(['result'=>'Invalid Module'],404);
        }

        $module->name = $request->input('edit_name');
        $module->code = $request->input('edit_code');
        $module->level = $request->input('edit_level');
        $module->semester = $request->input('edit_semester');
        $module->credits = $request->input('edit_credits');
        $module->departement_id = $request->input('edit_departement');
        $module->user_id = $request->input('edit_lecturer');

        try {
            $module->save();
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
