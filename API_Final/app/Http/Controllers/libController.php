<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\lib;
use  App\Models\lib_finance;

class libController extends Controller
{
   public function library()
   {


    $store=lib::all();

    return view('libs.lib')
    ->with('store',$store);
   }

   public function lib_fi()
   {


    $store=lib_finance::all();

    $debit=lib_finance::sum('debit');
    $credit=lib_finance::sum('credit');
    $balance=($debit-$credit);

    return view('libs.lib_fi')
    ->with('store',$store)
    ->with('debit',$debit)
    ->with('credit',$credit)
    ->with('balance',$balance);
   }
}
