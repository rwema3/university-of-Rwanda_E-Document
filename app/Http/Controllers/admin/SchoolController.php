<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\School;
use Illuminate\Http\Request;
use App\Models\admin\College;
use App\Http\Controllers\Controller;

class SchoolController extends Controller
{
    public function index(){
        $colleges = College::all();
        return view('admin.schools', ['college'=> $colleges]);
    }

    public function generalList(){
        $schools = School::all();
        return response()->json(['schools' => $schools], 200);
    }

    public function show($id)
    {
        $schools = School::find($id);
        if(!$schools){
            return response()->json(['message'=>'Not found'],404);
        }
        return response()->json(['school'=>$schools]);
    }

    public function create(Request $request)
    {
        $schools = new School();
        $schools->name = $request->input('school_name');
        $schools->college_id = $request->input('college_id');
        $schools->status = true;


        if ($file = $request->file('stamp')) {

            //store file into stamps folder
            $file = $request->file('stamp');
            // $name = $file->getClientOriginalName();
            $file->storeAs('uploads/images/stamps', 's3');

            $filename = time().$file->getClientOriginalName();
            $file->move(public_path('uploads/images/stamps'), $filename);
            $schools->stamp = $filename;
        }
        try {
            $schools->save();

        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }

        return response()->json(['result' => "ok"], 200);

    }



    public function update(Request $request)
    {
        $id = $request->input('id');
        $schools = School::find($id);
        if(!$schools)
        {
            return response()->json(['result'=>'Invalid School'],404);
        }



        if ($file = $request->file('stamp')) {
            //store file into stamps folder

            $filename = time().$file->getClientOriginalName();
            $file->storeAs('uploads/images/stamps', 's3');

            $file->move(public_path('uploads/images/stamps'), $filename);
            $schools->stamp = $filename;

        }
        else
        {
            $schools->stamp = $schools->stamp;

        }

        $schools->name = $request->input('edit_school_name');
        // $schools->college_id = $request->input('college_id');

        try {
            $schools->save();
        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['result' => "ok"], 200);
    }

    public function changeStatus(Request $request)
    {
        $id = $request->input('id');
        $schools = School::find($id);
        if(!$schools)
        {
            return response()->json(['result'=>'Invalid College'],404);
        }
        $schools->status = $request->input('status');
        try {
            $schools->save();
        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['result' => "ok"], 200);
    }

}
