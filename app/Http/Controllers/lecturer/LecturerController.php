<?php

namespace App\Http\Controllers\lecturer;

use App\Models\User;
use App\Models\user\Mark;
use App\Models\admin\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LecturerController extends Controller
{
    // lecturer
public function index(){
    // $student = User::Where('departement_id', auth()->user()->departement_id)->get();
    $student = User::whereRoleIs('user')->Where('departement_id', auth()->user()->departement_id)->get();
    $modules = Module::where(['user_id'=>Auth::user()->id])->get();
    
    return view('lecturer.teacher_dashboard', ['student'=>$student, 'modules'=> $modules]);
}

public function createMarks(Request $request){

    $mark = new Mark();
    $mark->marks = $request['marks'];
    $mark->user_id = $request['student'];
    $mark->module_id = $request['module'];
    $mark->save();
    return redirect()->back()->with('message', 'Marks Added succeffully');
}

public function updateMarks(Request $request){

    // $mark = new Mark();
    // $mark->marks = $request['marks'];
    // $mark->user_id = $request['student'];
    // $mark->module_id = $request['module'];
    // $mark->save();
    // dd($request);

    $affected = DB::table('marks')
              ->where(['user_id'=>$request['student'], 'module_id'=>$request['module']])
              ->update(['marks' => $request['marks']]);
      
          return redirect()->back()->with('message', 'Marks Updated succeffully');
}

public function Account()
{
    // dd(Auth::user()->roles()->get()[0]->name == 'administrator' );
    $modules = Module::where(['user_id'=>Auth::user()->id])->get();
    return view('lecturer.profile',['modules'=> $modules]);
}

public function moduleMarks($code, $id){
    $module = Module::find($id);
    $students = User::where(['departement_id'=> auth()->user()->departement_id,'level_id' =>$id])->whereRoleIs('user')->get();
    $modules = Module::where(['user_id'=>Auth::user()->id])->get();
    $marks = Mark::where(['module_id'=> $id])->get();

    return view('lecturer.module_marks', ['module'=> $module, 'students'=> $students, 'modules'=> $modules, 'marks' =>$marks]);
}

}
