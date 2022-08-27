<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function users(){
        return $this->hasMany(User::class);
    }


    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];
}
