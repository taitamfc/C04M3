<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    //Type => types
    // protected $table = 'types';

    public function books(){

        return $this->hasMany( Book::class,'type_id','id' );
    }
}
