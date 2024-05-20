<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isbn extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'updated_at'];

    protected $primaryKey = 'isbn';

    public function book(){
        return $this->hasMany(Book::class,'isbn_id','isbn');
    }

    public function rent(){
        return $this->hasManyThrough(Rent::class,Book::class,'isbn_id','inumber','isbn','inventorynumber');
    }
}
