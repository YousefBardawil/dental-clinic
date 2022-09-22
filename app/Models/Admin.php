<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory , HasRoles , HasApiTokens, Notifiable;

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
        return $this->belongsTo(User::class);
    }


}
