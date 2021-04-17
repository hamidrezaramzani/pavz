<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    // protected $guard = "user";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phonenumber',
        'password',
        'activeCode',
        'activeCodeExpire',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
    public function villas()
    {
        return $this->hasMany(Villa::class);
    }


    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }

    public function areas()
    {
        return $this->hasMany(Area::class);
    }

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
