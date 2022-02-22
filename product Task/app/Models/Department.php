<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product;

class Department extends Model
{
    use HasFactory;
    public $timestampts =false ;
    public function product(){

        return $this->hasMany(product::class);

    }
}
