<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Servicer extends Authenticatable
{

    use Notifiable;

    protected $guard = 'servicer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'owner_name', 'company_name', 'email', 'city', 'address', 'type_of_service', 'number', 'cover_image', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function cars()
    {
        return $this->hasMany('App\Car');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
