<?php

namespace App\Http\Controllers;

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
    
}
