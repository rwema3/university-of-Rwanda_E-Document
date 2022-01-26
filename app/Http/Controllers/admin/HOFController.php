<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\admin\Departement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class HOFController extends Controller
{

    public function index(){
        $staffs = User::all();
        $departements = Departement::all();
        return view('admin.hof', ['hof'=> $staffs, 'departements'=> $departements]);
    }

    public function generalList(){
        // $staffs = [];
        $staffs= User::whereRoleIs('hof')->get();
        return response()->json(['hof' => $staffs], 200);
    }

    public function show($id)
    {
        $staffs = User::find($id);
        if(!$staffs){
            return response()->json(['message'=>'Not found'],404);
        }
        return response()->json(['hof'=>$staffs]);
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
        // $staffs->departement_id = $request->input('departement_id');

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

        $staffs->attachRole('hof');


    //     if( $request->leader_assign){

    //         if($request->leader_assign == 3){
    //             $depat_model = DB::table('head_of_departements')
    //             ->where('departement_id', $request->departement_id)
    //             ->where('status', true)
    //             ->get();

    //             if(  count($depat_model) > 0 ){
    //             return response()->json(['result' => "ok", 'extra_message' => 'departement has active hof'], 200);
    //             }
    //             else{
    //                 $model = new HeadOfDepartement();
    //                 $model->user_id = $staffs->id;
    //                 $model->departement_id = $staffs->departement_id;
    //                 $staffs->attachRole('head_of_departement');

    //             }
    //         }

    //        else if($request->leader_assign == 2){
    //             $depat_model = DB::table('dean_of_schools')
    //             ->where('school_id', $request->departement_id)
    //             ->where('status', true)
    //             ->get();

    //             if(count($depat_model) > 0){
    //             return response()->json(['result' => "ok", 'extra_message' => 'School has active dean'], 200);
    //             }
    //             else{

    //                 $model = new DeanOfSchool();
    //                 $model->user_id = $staffs->id;
    //                 $model->school_id = $staffs->departement_id;
    //                 $staffs->attachRole('dean_of_school');
    //             }
    //         }

    //        else if($request->leader_assign == 1){
    //             $depat_model = DB::table('principal_of_colleges')
    //             ->where('college_id', $request->departement_id)
    //             ->where('status', true)
    //             ->get();

    //             if(count($depat_model) > 0){
    //             return response()->json(['result' => "ok", 'extra_message' => 'College has active principal'], 200);
    //             }
    //             else{
    //                 $model = new PrincipalOfCollege();
    //                 $model->user_id = $staffs->id;
    //                 $model->college_id = $staffs->departement_id;
    //                 $staffs->attachRole('principal');

    //             }
    //         }
    //         else{

    //             $staffs->attachRole('user');

    //         }
    //         $model->save();

    // }

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



        // if ($file = $request->file('stamp')) {
        //     //store file into stamps folder

        //     $filename = time().$file->getClientOriginalName();
        //     $file->storeAs('uploads/images/stamps', 's3');

        //     $file->move(public_path('uploads/images/stamps'), $filename);
        //     $staffs->stamp = $filename;

        // }
        // else
        // {
        //     $staffs->stamp = $staffs->stamp;

        // }

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
