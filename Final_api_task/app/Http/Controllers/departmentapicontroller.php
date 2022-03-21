<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\course;
use App\Models\department;

class deparmentapicontroller extends Controller
{
  
        public function view(){
    
            $departments = department::all();
            return $departments;
        }
    
        public function add(Request $req){
    
            $departments = new department();
            $departments->name = $req->name;
            if ($departments->save()) {
                return "Department Added Successful";
            }
        }
    
        public function update(Request $req){
    
            $departments = department::where('id', '=', $req->id)
            ->first();
            $departments->name = $req->name;
            if ($departments->save()) {
                return "Department Updated Successful";
            }
        }
    
        public function delete(Request $req){
    
            $departments = department::where('id', '=', $req->id)
            ->first();
            if ($departments->delete()) {
                return "Department Deleted Successful";
            }
        }
    
        public function details(Request $req){
 
             $department = department::where('id', $req->id)->first();
            if (!$department) return response("Department not found", 404);
            $department->course = $department->course;
            return response($department, 200);
        }
    }

