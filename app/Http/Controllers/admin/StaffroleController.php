<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Staffrole;
use Illuminate\Http\Request;

class StaffroleController extends Controller
{

    public function index(){
        return view('admin.staffroles');
    }

    public function generalList(){
        $staffRoles = Staffrole::all();
        return response()->json(['staffRoles' => $staffRoles], 200);
    }

    public function show($id)
    {
        $staffRole = Staffrole::find($id);
        if(!$staffRole){
            return response()->json(['message'=>'Not found'],404);
        }
        return response()->json(['staffRole'=>$staffRole]);
    }

    public function create(Request $request)
    {
        $staffRole = new Staffrole();
        $staffRole->name = $request->input('staffRole_name');
        $staffRole->status = true;

        try {
            $staffRole->save();

        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }

        return response()->json(['result' => "ok"], 200);

    }



    public function update(Request $request)
    {
        $id = $request->input('id');
        $staffRole = Staffrole::find($id);
        if(!$staffRole)
        {
            return response()->json(['result'=>'Invalid Staff Role'],404);
        }

        $staffRole->name = $request->input('edit_staffRole_name');
        try {
            $staffRole->save();
        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['result' => "ok"], 200);
    }

    public function changeStatus(Request $request)
    {
        $id = $request->input('id');
        $staffRole = Staffrole::find($id);
        if(!$staffRole)
        {
            return response()->json(['result'=>'Invalid Staff Role'],404);
        }
        $staffRole->status = $request->input('status');
        try {
            $staffRole->save();
        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['result' => "ok"], 200);
    }

}
