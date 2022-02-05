<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function Home(){
        return view('home');
    }
    public function Contact(){
        return view('contact');
    }
    public function Login(){
        return view('login');
    }
    public function admlog(){
        return view('admin.adminlogin');
    }
} 
