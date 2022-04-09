<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\offer;


class APIController extends Controller
{
  public function view(){

    $offer=offer::all();

    return $offer;


  }
  public function add(Request $req){
    
    $offer = new offer();
    $offer->course = $req->course;
    $offer->capacity = $req->capacity;
    $offer->status = $req->status;
    $offer->credit = $req->credit;
    $offer->dept = $req->dept;
    if ($offer->save()) {
        return "Course Added Successful";
    }
}
public function update(Request $req){
    
  $offer = offer::where('id', '=', $req->id)
  ->first();

  $offer->course = $req->course;
  $offer->capacity = $req->capacity;
  $offer->status = $req->status;
  $offer->credit = $req->credit;
  $offer->dept = $req->dept;
  if ($offer->save()) {
      return "Course Updated Successful";
  }
}

public function delete(Request $req){

  $offer = offer::where('id', '=', $req->id)
  ->first();
  if ($offer->delete()) {
      return "Course Deleted Successful";
  }
}
}
