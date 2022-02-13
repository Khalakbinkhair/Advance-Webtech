<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class CRUDController extends Controller
{
     


    public function Delete(){
        return view('delete');
    }
    public function Update(){

        return view('update');
    }
    public function Get(Request $req){

        // $student = array
        // (
        //     "userid" => $req->userid,
        //     "username" => $req->username,
        //     "price" => $req->price,
        //     "quantity" => $req->quantity,
        //     "description" => $req->description
        // );
        // $student =(object)  $student;


        $products = product::where('userid','=',$req->userid)->first();
      //  return $products;
      
        return view('get')
         ->with('products', $products);
    }
  public function list(){

    //    $students=[];
    //    for($i=1;$i<=10;$i++){
    //        $student = array(
    //            'userid' => " Product $i",
    //            "username" => $i,
    //            "price" => $i,
    //            "quantity" => $i,
    //            "description" => $i
    //        );
    //        $students[] = (object)$student;            
    //    }
  //Select * from products
    $products = product::all();
       //  return $products;

       return view('list')
       ->with('products',$products);
            
  }
   
 
    
}
