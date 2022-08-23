<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function rooms(){
        return $this->belongsToMany(Room::class,'room_services','room_id','service_id','id','id');
    }

    public function clients(){
        return $this->belongsToMany(Client::class,'client_services','client_id','service_id','id','id');
    }

    public function dentists(){
        return $this->belongsToMany(Dentist::class,'dentist_services','dentist_id','service_id','id','id');
    }

    public function appointments(){
        return $this->hasMany(Appointment::class,'service_id');
    }
}
