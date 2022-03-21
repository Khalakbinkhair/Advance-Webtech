<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\course;
use App\Models\department;

class crudapiController extends Controller
{
    
        public function view(){
    
            $courses = course::all();
            return $courses;
        }
    
        public function add(Request $req){
    
            $courses = new course();
            $courses->name = $req->name;
            $courses->offered_by = $req->offered_by;
            if ($courses->save()) {
                return "Course Added Successful";
            }
        }
    
        public function update(Request $req){
    
            $courses = course::where('id', '=', $req->id)
            ->first();
            $courses->name = $req->name;
            $courses->offered_by = $req->offered_by;
            if ($courses->save()) {
                return "Course Updated Successful";
            }
        }
    
        public function delete(Request $req){
    
            $courses = course::where('id', '=', $req->id)
            ->first();
            if ($courses->delete()) {
                return "Course Deleted Successful";
            }
        }

   
    }