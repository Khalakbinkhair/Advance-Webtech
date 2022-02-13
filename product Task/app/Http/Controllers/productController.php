<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class productController extends Controller
{
    public function reg(){
        return view('registration');
    }
    public function Home(){
        return view('home');
    }
    
    public function regsubmit(Request $req){

        $req->validate(
[
          'userid' => 'required',
          'name' => 'required',
          'price' =>'required',
          'quantity' =>'required|min:1',
          'description' =>'required|min:1'
],

[   'userid.required' =>'*Enter you ID here',
    'name.required'=> '*Enter your username',
    'price.required'=> '*Price required ',
    'quantity.required'=>'*Atleast 1 product required ',
    'description.required' =>'*Write description'

]

);

    $pro = new product();

    $pro->userid =$req->userid;
    $pro->username=$req->name;
    $pro->price=$req->price;
    $pro->quantity=$req->quantity;
    $pro->description=$req->description;
    $pro->save();




        return "<html>

        <body bgcolor='grey'>
        
        <h1> Upload successfull...!</h1>
        
        
        
        </body>
        </html>
        
        
        ";
    }
  


}
