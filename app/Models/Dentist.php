<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dentist extends Model
{
    use HasFactory;
    public function user(){

        return $this->morphOne(User::class ,'actor','actor_type','actor_id','id');
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
    public function clients(){
        return $this->belongsToMany(Client::class,'client_dentists','client_id','dentist_id','id','id');
    }

    public function rooms(){
        return $this->belongsToMany(Room::class,'dentist_rooms','dentist_id','room_id','id','id');
    }

    public function services(){
        return $this->belongsToMany(Service::class,'dentist_services','dentist_id','service_id','id','id');
    }

    public function openinghours(){
        return $this->hasMany(OpeningHour::class,'dentist_id');
    }
    public static function boot() {
        parent::boot();

        static::deleting(function($dentist) { // before delete() method call this
             $dentist->user()->delete();
             $dentist->city()->delete();
             // do the rest of the cleanup...
        });}
}
