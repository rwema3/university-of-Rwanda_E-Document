<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\admin\College;
use App\Http\Controllers\Controller;

class CollegeController extends Controller
{

    public function index(){
        return view('admin.colleges');
    }

    public function generalList(){

        $colleges = College::all();
        return response()->json(['colleges' => $colleges], 200);
    }

    public function show($id)
    {
        $college = College::find($id);
        if(!$college){
            return response()->json(['message'=>'Not found'],404);
        }
        return response()->json(['college'=>$college]);
    }

    public function create(Request $request)
    {
        $college = new College();
        $college->name = $request->input('college_name');
        $college->status = true;

        if ($files = $request->file('stamp')) {

            //store file into stamps folder
            $file = $request->file('stamp');
            $name = $file->getClientOriginalName();
            $file->storeAs('uploads/images/stamps', 's3');

            $filename = time().$file->getClientOriginalName();
            $file->move(public_path('uploads/images/stamps'), $filename);
            $college->stamp = $filename;


        }
        try {
            $college->save();

        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }

        return response()->json(['result' => "ok"], 200);

    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $college = College::find($id);
        if(!$college)
        {
            return response()->json(['result'=>'Invalid College'],404);
        }

        if ($file = $request->file('stamp')) {
            //store file into stamps folder

            $filename = time().$file->getClientOriginalName();
            $file->storeAs('uploads/images/stamps', 's3');

            $file->move(public_path('uploads/images/stamps'), $filename);
            $college->stamp = $filename;

        }
        else
        {
            $college->stamp = $college->stamp;

        }

        $college->name = $request->input('edit_college_name');
        try {
            $college->save();
        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['result' => "ok"], 200);
    }

    public function changeStatus(Request $request)
    {
        $id = $request->input('id');
        $college = College::find($id);
        if(!$college)
        {
            return response()->json(['result'=>'Invalid College'],404);
        }
        $college->status = $request->input('status');
        try {
            $college->save();
        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['result' => "ok"], 200);
    }


}
