<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientDentist extends Model
{
    use HasFactory;

    public function client_dentists(){
        return $this->hasMany(Client::class,Dentist::class,'client_dentists');
    }
}
