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
    public function showdoctor(Request $request){
        $doctor= Doctor::all();
        
        return view('admin.showdoctor',['doctors'=>$doctor]);
    }
    public function deleted($id){
        $delete_data= Doctor::find($id);
        $delete_data->delete();

        return redirect()->back();
    }
    public function update_doctor($id){
        $data= Doctor::find($id);

        return view('admin.update_doctor',['data'=>$data]);


    }
    public function edit_doctor(Request $request, $id){
        $doctor= Doctor::find($id);
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;

        $image=$request->image;
        if($image){

        $imagename= time().'.'.$image->getClientoriginalExtension();
        $request->image->move('doctor_image',$imagename);
        $doctor->image=$imagename;

        }

        $doctor->save();
        return redirect()->back()->with('message','Doctor Image Updated Successfully'); 

    }
    
}
