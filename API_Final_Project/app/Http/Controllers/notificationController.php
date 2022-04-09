<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;
use App\Models\registration;
use App\Models\department;
use App\Models\teacher_notice;
use App\Models\note;



class notificationController extends Controller
{
    public function coursereg(){

        $name=session()->get('userid');    
        $info=registration::where('userid',$name)->first(); 


        return view('notification.reg')
        ->with('info', $info);

    } 

    public function schedule(Request $req){

        $d=registration::where('userid',$req->userid)->first();

   
           return view('notification.course')
           ->with('d',$d);
   
       } 
       public function notify(Request $req){

        $course=course::where('name',$req->name)->first();
         
       

       
   
   
           return view('notification.notify')
           ->with('course',$course);
   
       } 

}
