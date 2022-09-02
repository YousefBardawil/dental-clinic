<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function client(){
        return $this->belongsTo(Client::class,'client_id','id');
    }
    public function dentist(){
        return $this->belongsTo(Dentist::class,'dentist_id','id');
    }
    public function service(){
        return $this->belongsTo(Service::class,'service_id','id');
    }
}
