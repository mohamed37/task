<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins';

    protected $guard = 'admin';
    
    protected $fillable = ['name', 'email', 'password','avatar','mobile'];

    public function setPasswordAttribute($password)
    {
        if(!empty($password))
        {
            $this->attributes['password'] = Hash::make($password);
        }
    }


    public function getImagePathAttribute()
    {
        return asset('uploads/images/'.$this->avatar);
    }
    
}
