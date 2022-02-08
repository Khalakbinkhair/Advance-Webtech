<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;


class registrationcontroller extends Controller
{
    public function reg(){
        return view('registration');
    }
    public function registrationsubmit(Request $req){

        $req->validate([

           'username'=>'required',
           'userid'=>'required',
           'email'=>'required' ,
           'dob'=>'required' ,
           'add'=>'required' ,
           'password'=>'required' ,
           'confirmpassword'=>'required|same:password' ,
           'file'=>'required' ,
          

        ],
        [
        'email.required'=>"please Enter any email",
        'dob.required'=>"please Fill any Date",
        
        'add.required'=>"Address required ",
        'file.required'=>"upload any photos ",
       

        ]
    
    );
    //end of validation
      $st = new student();
      $st->username = $req->username;
      $st->userid = $req->userid;
      $st->email = $req->email;
      $st->dob = $req->dob;
      $st->add = $req->add;
      $st->password = $req->password;
      $st->confirmpassword = $req->confirmpassword;
      $st->file = $req->file;
      $st->save();

        return "Welcome to New page here your name $req->username and  your id is $req->userid";
    }
}
