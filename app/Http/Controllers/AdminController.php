<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function appointment(Request $request){
        $data= new Appointment();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->date= $request->date;
        $data->phone= $request->phone;
        $data->message = $request->message;
        $data->doctor = $request->doctor;
        $data->status ='In progress';
         if(Auth::id()){

            $data->user_id=Auth::user()->id;

         }
         $data->save();

         return redirect()->back()->with('message','Appointment request Successful. We will contact with you soon');

    }
}
