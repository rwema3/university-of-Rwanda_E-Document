<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\admin\College;
use App\Http\Controllers\Controller;
use App\Models\admin\Departement;
use App\Models\admin\School;

class DepartementController extends Controller
{
    public function index(){
        $colleges = College::all();
        $schools = School::all();

        return view('admin.departements', ['colleges'=> $colleges, 'schools'=>$schools]);
    }

     public function SchoolCollege(Request $request){
        $college_id = $request->id;

        $school_coll = College::where('id',$college_id)
                              ->with('schools')
                              ->get();
        return response()->json([
            'college' => $school_coll
        ]);
     }

    public function generalList(){
        $departements = Departement::all();
        return response()->json(['departements' => $departements], 200);
    }

    public function show($id)
    {
        $departements = Departement::find($id);
        if(!$departements){
            return response()->json(['message'=>'Not found'],404);
        }
        return response()->json(['departement'=>$departements]);
    }

    public function create(Request $request)
    {
        $departements = new Departement();
        $departements->name = $request->input('departement_name');
        $departements->college_id = $request->input('college_id');
        $departements->school_id = $request->input('school_id');
        $departements->status = true;


        if ($file = $request->file('stamp')) {

            //store file into stamps folder
            $file = $request->file('stamp');
            // $name = $file->getClientOriginalName();
            $file->storeAs('uploads/images/stamps', 's3');

            $filename = time().$file->getClientOriginalName();
            $file->move(public_path('uploads/images/stamps'), $filename);
            $departements->stamp = $filename;

        }
        try {
            $departements->save();

        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }

        return response()->json(['result' => "ok"], 200);

    }



    public function update(Request $request)
    {
        $id = $request->input('id');
        $departements = Departement::find($id);
        if(!$departements)
        {
            return response()->json(['result'=>'Invalid Departement'],404);
        }

        if ($file = $request->file('stamp')) {
            //store file into stamps folder

            $filename = time().$file->getClientOriginalName();
            $file->storeAs('uploads/images/stamps', 's3');

            $file->move(public_path('uploads/images/stamps'), $filename);
            $departements->stamp = $filename;

        }
        else
        {
            $departements->stamp = $departements->stamp;

        }

        $departements->name = $request->input('departement_name');
        try {
            $departements->save();
        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['result' => "ok"], 200);
    }

    public function changeStatus(Request $request)
    {
        $id = $request->input('id');
        $departements = Departement::find($id);
        if(!$departements)
        {
            return response()->json(['result'=>'Invalid Departement'],404);
        }
        $departements->status = $request->input('status');
        try {
            $departements->save();
        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['result' => "ok"], 200);
    }

}
