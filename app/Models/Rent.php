<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;
    protected $table = "rent";

    public function person(){
        return $this->hasMany(Person::class,'id','person_id');
    }

    public function book(){
        return $this->hasMany(Book::class,'inventorynumber','in');
    }

    public function isbn(){
        return $this->hasManyThrough(Isbn::class,Book::class,'inventorynumber','isbn','in','isbn');
    }
}
