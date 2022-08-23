<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public function dentist(){
        return $this->belongsTo(Dentist::class,'dentist_id');
    }

    public function client(){
        return $this->belongsTo(Client::class,'client_id');
    }

    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }

    public function room(){
        return $this->belongsTo(Room::class,'room_id');
    }
}
