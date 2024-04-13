<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    public function person(){
        return $this->belongsTo(Person::class);
    }

    public function book(){
        return $this->belongsTo(Book::class,'inumber','inventorynumber');
    }

    public function isbn(){
        return $this->hasOneThrough(Isbn::class,Book::class,'inventorynumber', 'isbn', 'inumber', 'isbn_id');
    }
}