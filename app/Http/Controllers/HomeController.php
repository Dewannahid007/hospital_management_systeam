<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
     //
     public function home(){
        if(Auth::id()){
            if(Auth::user()->usertype==0){
                $doctor = Doctor::all();

                return view('user.home',['doctors'=>$doctor]);

             }
            else{
                return view('admin.home');
            }

        }
        else{
            return redirect()->back();
        }

    }
    public function index(){
         $doctor = Doctor::all();

        return view('user.home',['doctors'=>$doctor]);
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
    public function myappointment(){
        if(Auth::id()){
            $user_id=Auth::user()->id;
            $appoint=Appointment::where('user_id',$user_id)->get();



            return view('user.my_appointment',['appoints'=>$appoint]);
        }
        else{
            return redirect()->back();
        }


    }
    public function cancel_appoint($id){
        $data=Appointment::find($id);
        $data->delete();
        return redirect()->back();

    }
    
}
