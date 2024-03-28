<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = "book";

    public function isbn(){
        return $this->hasMany(Isbn::class,'isbn','isbn');
    }

    public function rent(){
        return $this->belongsTo(Rent::class,'inventorynumber','in');
    }
}
