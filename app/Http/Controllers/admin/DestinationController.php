<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{

    public function index(){
        return view('admin.destination');
    }

    public function generalList(){
        $destinations = Destination::all();
        return response()->json(['destinations' => $destinations], 200);
    }

    public function show($id)
    {
        $destination = Destination::find($id);
        if(!$destination){
            return response()->json(['message'=>'Not found'],404);
        }
        return response()->json(['destination'=>$destination]);
    }

    public function create(Request $request)
    {
        $destination = new Destination();
        $destination->name = $request->input('destination_name');
        $destination->telphone = $request->input('telphone');
        $destination->email = $request->input('email');
        $destination->about = $request->input('about');
        $destination->status = true;
        $destination->completed = false;

        // if ($files = $request->file('stamp')) {

        //     //store file into stamps folder
        //     $file = $request->file('stamp');
        //     $name = $file->getClientOriginalName();
        //     $file->storeAs('uploads/images/stamps', 's3');

        //     $filename = time().$file->getClientOriginalName();
        //     $file->move(public_path('uploads/images/stamps'), $filename);
        //     $destination->stamp = $filename;

        // }

        try {
            $destination->save();

        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }

        return response()->json(['result' => "ok"], 200);

    }



    public function update(Request $request)
    {
        $id = $request->input('id');
        $destination = Destination::find($id);
        if(!$destination)
        {
            return response()->json(['result'=>'Invalid Destinatiion'],404);
        }

        // if ($file = $request->file('stamp')) {
        //     //store file into stamps folder

        //     $filename = time().$file->getClientOriginalName();
        //     $file->storeAs('uploads/images/stamps', 's3');

        //     $file->move(public_path('uploads/images/stamps'), $filename);
        //     $destination->stamp = $filename;

        // }
        // else
        // {
        //     $destination->stamp = $destination->stamp;

        // }

        $destination->name = $request->input('edit_name');
        $destination->telphone = $request->input('edit_telphone');
        $destination->email = $request->input('edit_email');
        $destination->about = $request->input('edit_about');
        try {
            $destination->save();
        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['result' => "ok"], 200);
    }

    public function changeStatus(Request $request)
    {
        $id = $request->input('id');
        $destination = Destination::find($id);
        if(!$destination)
        {
            return response()->json(['result'=>'Invalid Destination'],404);
        }
        $destination->status = $request->input('status');
        try {
            $destination->save();
        } catch (\Throwable $exception) {
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['result' => "ok"], 200);
    }

}
