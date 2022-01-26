<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\admin\School;
use Illuminate\Http\Request;
use App\Models\admin\College;
use App\Models\admin\Departement;
use App\Models\staff\Staffrequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\student\TranscriptRequest;

class AdminController extends Controller
{
      public function dashboard()
    {
        // dd(Auth::user()->name);

        if(Auth::user()->hasRole('administrator')){

            $colleges = College::all();
            $schools = School::all();
            $departements = Departement::all();
            $staffs = User::whereRoleIs('lecturer')->get();
            return view('admin.dashboard', ['colleges'=> $colleges, 'schools'=>$schools, 'departements'=>$departements, 'staffs'=> $staffs ]);
        }

        if ( Auth::user()->hasRole('lecturer') ){
        return redirect()->route('lecturer.dashboard');

        }


        if ( Auth::user()->hasRole('user') ){
            return redirect()->route('user.dashboard');
    
            }

            if ( Auth::user()->hasRole('hod') ){
                return redirect()->route('hod.dashboard');
                }

            if ( Auth::user()->hasRole('hof') ){

                return redirect()->route('hof.dashboard');
        
                }

        else {

        return  redirect()->route('home');
         }

    }



    public function adminProfile()
    {
        return view('admin.profile');
    }
}
