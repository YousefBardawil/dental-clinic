<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DentistRoom extends Model
{
    use HasFactory;

    public function dentist_rooms(){
        return $this->hasMany(Dentist::class,Room::class,'dentist_rooms');
    }
}
