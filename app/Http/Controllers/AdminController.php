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
    public function showappointment(){
        $data =Appointment::all();


        return view('admin.showappointment',['datas'=>$data]);
    }
    public function approved($id){
        $data=Appointment::find($id);
        $data->status ='approved';
        $data->save();

        return redirect()->back();


    }
    public function canceled($id){
        $data=Appointment::find($id);
        $data->status='canceled';
        $data->save();

        return redirect()->back();
        

        

    }
    
}
