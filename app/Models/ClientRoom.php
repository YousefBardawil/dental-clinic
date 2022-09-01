<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientRoom extends Model
{
    use HasFactory;
    public function client_rooms(){
        return $this->hasMany(Clientt::class,Room::class,'client_rooms');
    }
}
