<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\offer;
use app\Models\fac;



class gradeController extends Controller
{
  

   public function list(){

    $offer=offer::all();

    

    return view('course.list')
    ->with('offer',$offer);
    
   }
   public function details(Request $req)
   {

      $of=offer::where('id',decrypt($req->id))->first();




      return view('course.details')
      ->with('of', $of);
   }

   public function ok(Request $req)

   {




      // $offer=finance::all();
      // $of=finance::where('id',($req->id))->first();
      



      return view('course.details');
      // ->with('offer', $offer)
      // ->with('of', $of);
   }

   
}