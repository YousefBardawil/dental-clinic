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

    public static function boot() {
        parent::boot();

        static::deleting(function($dentist) { // before delete() method call this
             $dentist->user()->delete();
             $dentist->city()->delete();
             // do the rest of the cleanup...
        });}
}
