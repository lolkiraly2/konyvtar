<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
   
    protected $guarded = ['created_at', 'updated_at'];

    public function rent(){
        return $this->hasMany(Rent::class);
    }

    public function typename(){
        switch ($this->type) {
            case 'student':
                return 'Diák';
            case 'professor':
                return 'Professzor';
            case 'fromElsewhere':
                return 'Másik egyetemi';
            case 'other':
                return 'Külsős';
        }
    }
}
