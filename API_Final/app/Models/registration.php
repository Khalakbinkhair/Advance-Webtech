<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\teacher_notice;
use  App\Models\course; 

class registration extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='registrations';
    protected $primaryKey = 'id';

    public function courses(){
        return $this->hasMany(course::class,'reg_id');
    }

}
