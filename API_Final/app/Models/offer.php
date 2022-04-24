<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\facs;

class offer extends Model
{
    use HasFactory;
    public $timestamps=false;
   


    //relationship functions
    public function fac(){
          return $this->hasmany(fac::class);
    }
}
