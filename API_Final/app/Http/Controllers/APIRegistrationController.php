<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\registration;

class APIRegistrationController extends Controller
{
    public function view(){

        $registration=registration::all();
    
        return $registration;
    
    
      }
      public function add(Request $req){
        
        $registration = new registration();

       $registration->name = $req->name;
       $registration->userid= $req->userid;
       $registration->email = $req->email;
       $registration->address = $req->address;
       $registration->password =md5($req->password);
       $registration->blood_group = $req->blood_group;
        if ($registration->save()) {
            return "Registration Added Successful";
        }
    }
    public function update(Request $req){
        
     $registration = registration::where('id', '=', $req->id)
      ->first();

      
      $registration->name = $req->name;
      $registration->userid= $req->userid;
      $registration->email = $req->email;
      $registration->address = $req->address;
      $registration->password =md5($req->password);
      $registration->blood_group = $req->blood_group;
     
      if ($registration->save()) {
          return "Registration Updated Successful";
      }
    }
    
    public function delete(Request $req){
    
     $registration = registration::where('id', '=', $req->id)
      ->first();
      if ($registration->delete()) {
          return "Registration Deleted Successful";
      }
    }

    public function login(Request $req){

        $reg = registration::where('userid', '=', $req->userid)
        ->where('password', '=', md5($req->password))
        ->first();
        if (!$reg) {
            return "Invalid User";
        }
        return $reg;
        
    }
}
