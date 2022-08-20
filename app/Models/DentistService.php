<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DentistService extends Model
{
    use HasFactory;
    public function dentist_services(){
        return $this->hasMany(Dentist::class,Service::class,'dentist_services');
    }
}
