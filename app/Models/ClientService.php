<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientService extends Model
{
    use HasFactory;
    public function client_services(){
        return $this->hasMany(Client::class,Service::class,'client_services');
    }
}
