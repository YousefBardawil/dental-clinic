<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Dentist extends Authenticatable
{
    use HasFactory , HasRoles , HasApiTokens;

    // public function getNameAttribute() // name
    // {
    //     return $this->user->first_name;
    // }

    // public function getFullNameAttribute() // full_name
    // {
    //     return $this->user->first_name . " " . $this->user->last_name;
    // }

    public function getImagesAttribute()
    {
        return $this->image;
    }

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

    public function appointments(){
        return $this->hasMany(Appointment::class,'dentist_id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($dentist) { // before delete() method call this
             $dentist->user()->delete();
             $dentist->city()->delete();
             // do the rest of the cleanup...
        });}
}
