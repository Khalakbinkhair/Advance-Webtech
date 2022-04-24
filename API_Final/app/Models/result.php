<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\finance;

class result extends Model
{
    use HasFactory;
    public $timestamps=false;

    
    //relationship functions
    public function finance(){
        return $this->hasmany(finance::class);
}
}