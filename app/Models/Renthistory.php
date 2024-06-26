<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renthistory extends Model
{
    use HasFactory;

    protected $guarded = ['created_at', 'updated_at'];

    public function findname(){
        $szemely = Person::find($this->person_id);
        if($szemely != null)
            return $szemely->name;
        else
            return "Törölt tag";
    }

    public function findtitle(){
        $inumber = Book::find($this->inumber);
        $title = $inumber->isbn->title;
        if($title != null)
            return $title;
        else
            return "Törölt könyv";
    }
}
