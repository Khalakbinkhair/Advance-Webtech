<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fac;

class APIFacController extends Controller
{

    public function view(){

        $fac=fac::all();
    
        return  $fac;
    
    
      }
      public function add(Request $req){
        
        $fac = new fac();
        $fac->name = $req->name;
        $fac->day = $req->day;
        $fac->time = $req->time;
        $fac->room = $req->room;
     
        if ( $fac->save()) {
            return "Faculty Added Successful";
        }
    }
    public function update(Request $req){
        
         $fac = fac::where('id', '=', $req->id)
      ->first();

        $fac->name = $req->name;
        $fac->day = $req->day;
        $fac->time = $req->time;
        $fac->room = $req->room;
     
  
    
      if ($fac->save()) {
          return "Faculty List Updated Successful";
      }
    }
    
    public function delete(Request $req){
    
        $fac = fac::where('id', '=', $req->id)
      ->first();
      if ($fac->delete()) {
          return "Faculty Deleted Successful";
      }
    }

   
}
