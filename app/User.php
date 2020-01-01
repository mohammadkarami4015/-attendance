<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $guarded = [];
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

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function setAdmin()
    {
        $this->roles()->attach(Role::where('title', 'admin')->get()->first()->id);
    }

    public function isAdmin()
    {
        return $this->roles()->where('title', '=', 'admin')->exists();
    }

    public function shifts()
    {
        return $this->belongsToMany(Shift::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    public function vacations()
    {
        return $this->hasMany(Demand_vacation::class);
    }
}
