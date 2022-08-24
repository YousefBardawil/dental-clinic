<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function reviews(){
        return $this->hasMany(Review::class);
    }

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
        return $this->belongsToMany(Room::class,'client_rooms','client_id','room_id','id','id');
    }
    public function services(){
        return $this->belongsToMany(Service::class,'client_services','client_id','service_id','id','id');
    }

    public function appointments(){
        return $this->hasMany(Appointment::class,'client_id');
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
