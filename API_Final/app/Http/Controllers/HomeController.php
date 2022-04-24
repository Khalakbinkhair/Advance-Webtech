<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\result;
use  App\Models\finance;
use  App\Models\registration;
use  App\Models\teacher_notice;



use PDF;

class HomeController extends Controller
{
  public function dashboard(Request $req){

   

    return view('dashboard');

  
  } 

  public function dashcourse(){

    return view('dashboard');
  } 

 public function course(){
   
  return view('course.course');
} 

public function coursesub(Request $req){
 
$sem=result::where('session',$req->Semester)
->get();



  return view('course.showcourse')
  ->with('sem',$sem);
}
 

public function showcourse(){
  return view('course.showcourse');
} 



public function grade(){

  $sem=result::all();
  $gpa=result::sum('gpa');
  $credit=result::sum('credit');
  

  $cgpa=($gpa/$credit);

  
  return view('gradereport.grade')
  ->with('sem',$sem )
  ->with('gpa',$gpa )
  ->with('credit',$credit)
  ->with('cgpa',$cgpa)
  ;
 
} 
public function pdfdownload(){

  $sem=result::all();
  $gpa=result::sum('gpa');
  $credit=result::sum('credit');
  

  $cgpa=($gpa/$credit);

	$pdf = PDF::loadview('gradereport.grade', ['sem'=> $sem, 'gpa'=>$gpa, 'credit'=>$credit, 'cgpa'=>$cgpa])
    	->setOptions(['defaultFont' => 'sans-serif'])
    	->setPaper('a4','landscape') ;

  

     return $pdf->download('result.pdf');
  
  
 
} 



public function finance(){

  $total=finance::all();

  $debit=finance::sum('debit');
  $credit=finance::sum('credit');
  $utility=finance::sum('utility');
  

  $balance= ($credit - $debit);
   

  
  return view('financ')
  ->with('total',$total )
  ->with('debit',$debit )
  ->with('credit',$credit)
  ->with('balance',$balance)
  
  ;

  
  
} 

//course Registration
public function reg(Request $req){


  return view('reg');
 
  }

  public function regsub(Request $req){



    $sem=result::where('session',$req->Semester)->get();
    

    $session=result::where('session',$req->Semester)->first('session');


  $credit=result::where('session',$req->Semester)->sum('credit');

   $fees=($credit*5500);

  
    
    
      return view('regsub')
      ->with('sem',$sem)
      ->with('credit',$credit)
      ->with('session',$session)
      ->with('fees',$fees);
   
    
  }

  public function noti(){

    $notice=teacher_notice::all();

    return view('noti')
    ->with('notice',$notice);
  } 


}
