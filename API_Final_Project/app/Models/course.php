<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class course extends Model
{
 
    use HasFactory;
    public $timestamps=false;
    protected $table='courses';
    
    public function registrations(){
        return $this->belongsTo(registration::class,'reg_id');
    }

        public function notes(){
            return $this->hasMany(Note::class,'c_id');
        }
    }

