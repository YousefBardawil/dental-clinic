<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $fillable = ['room_name'];

    public function dentists(){
        return $this->belongsToMany(Dentist::class, 'dentist_rooms','dentist_id','room_id','id','id');
    }

    public function clients(){
        return $this->belongsToMany(Client::class, 'client_rooms','client_id','room_id','id','id');
    }

    public function services(){
        return $this->belongsToMany(Service::class,'room_services','room_id','service_id','id','id');
    }

    public function appointments(){
        return $this->hasMany(Appointment::class,'room_id');
    }
}
