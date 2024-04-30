<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'updated_at'];

    protected $primaryKey = 'inventorynumber';

    public function isbn(){
        return $this->belongsTo(Isbn::class,'isbn_id','isbn');
    }

    public function rent(){
        return $this->hasMany(Rent::class,'inumber','inventorynumber');
    }
}
