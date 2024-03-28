<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isbn extends Model
{
    use HasFactory;
    protected $table = "isbn";

    public function book(){
        return $this->belongsTo(Book::class,'isbn','isbn');
    }
}
