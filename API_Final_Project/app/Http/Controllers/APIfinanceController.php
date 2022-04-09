<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\finance;

class APIfinanceController extends Controller
{
    public function view(){

        $finance=finance::all();
    
        return  $finance;
    
    
      }
      public function add(Request $req){
        
        $finance = new finance();
        $finance->date = $req->date;
        $finance->particulars = $req->particulars;
        $finance->debit = $req->debit;
        $finance->credit = $req->credit;
        $finance->balance = $req->balance;
        $finance->utility = $req->utility;
     
        if ( $finance->save()) {
            return "finance Added Successful";
        }
    }
    public function update(Request $req){
        
        $finance = finance::where('id', '=', $req->id)
      ->first();
    

      $finance->date = $req->date;
      $finance->particulars = $req->particulars;
      $finance->debit = $req->debit;
      $finance->credit = $req->credit;
      $finance->balance = $req->balance;
      $finance->utility = $req->utility;
    
      if ($finance->save()) {
          return "Finance Updated Successful";
      }
    }
    
    public function delete(Request $req){
    
      $finance = finance::where('id', '=', $req->id)
      ->first();
      if ($finance->delete()) {
          return "finance Deleted Successful";
      }
    }
}
