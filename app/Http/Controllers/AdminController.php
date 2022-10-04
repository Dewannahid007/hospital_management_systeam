<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function addview(){

        
        return view('admin.add_doctor');
    }
    public function upload_doctor(Request $request){
        $doctor = new doctor();
        $image = $request->image;
        $imagename= time().'.'.$image->getClientoriginalExtension();
        $request->image->move('doctor_image',$imagename);
        $doctor->image=$imagename;

        $doctor->name = $request->name;
        $doctor->phone = $request->number;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;

        $doctor->save();
        return redirect()->back()->with('message','Doctor Add Successfully');




    }
}
