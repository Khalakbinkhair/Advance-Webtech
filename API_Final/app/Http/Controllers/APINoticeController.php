<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher_notice;

class APINoticeController extends Controller
{
    public function view(){

        $teacher_notice=teacher_notice::all();
    
        return  $teacher_notice;
    
    
      }
      public function add(Request $req){
        
        $teacher_notice = new teacher_notice();
        $teacher_notice->headline = $req->headline;
        $teacher_notice->whole = $req->whole;
     
        if ( $teacher_notice->save()) {
            return "Notice Added Successful";
        }
    }
    public function update(Request $req){
        
        $teacher_notice = teacher_notice::where('id', '=', $req->id)
      ->first();
    
      $teacher_notice->headline = $req->headline;
      $teacher_notice->whole = $req->whole;
    
      if ($teacher_notice->save()) {
          return "Notice Updated Successful";
      }
    }
    
    public function delete(Request $req){
    
      $teacher_notice = teacher_notice::where('id', '=', $req->id)
      ->first();
      if ($teacher_notice->delete()) {
          return "Notice Deleted Successful";
      }
    }
}
