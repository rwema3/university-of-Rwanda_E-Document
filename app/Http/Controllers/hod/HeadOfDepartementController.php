<?php

namespace App\Http\Controllers\hod;

use App\Models\User;
use App\Models\admin\Module;
use App\Http\Controllers\Controller;

class HeadOfDepartementController extends Controller
{
    public function index(){

        $modules = Module::where(['departement_id'=> auth()->user()->departement_id])->get();
        $students = User::where(['departement_id'=> auth()->user()->departement_id])->whereRoleIs('user')->get();
        $staffs = User::WhereRoleIs('lecturer')->Where(['departement_id'=>auth()->user()->departement_id])->get();
        return view('hod.dashboard', ['modules'=> $modules, 'students'=>$students,'staffs'=> $staffs ]);    }
}
