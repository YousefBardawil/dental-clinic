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

    public static function boot() {
        parent::boot();

        static::deleting(function($client) { // before delete() method call this
             $client->user()->delete();
             $client->city()->delete();
             // do the rest of the cleanup...
        });}

}
