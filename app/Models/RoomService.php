<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomService extends Model
{
    use HasFactory;
    public function room_services(){
        return $this->hasMany(Room::class,Service::class,'room_services');
    }
}
