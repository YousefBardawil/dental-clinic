<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function user(){

        return $this->morphOne(User::class ,'actor','actor_type','actor_id','id');
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function dentists(){
        return $this->belongsToMany(Dentist::class,'client_dentists','client_id','dentist_id','id','id');
    }

    public function rooms(){
        return $this->belongsToMany(Room::class,'dentist_rooms','dentist_id','room_id','id','id');
    }

    public function medicalhistories(){
        return $this->hasOne(Medical_history::class,'client_id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($client) { // before delete() method call this
             $client->user()->delete();
             $client->city()->delete();
             // do the rest of the cleanup...
        });}

}
