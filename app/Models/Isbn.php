<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isbn extends Model
{
    use HasFactory;
  

    public function book(){
        return $this->hasMany(Book::class,'isbn_id','isbn');
    }
}
