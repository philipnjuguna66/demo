<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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


    protected $appends  = [
        'name'
    ];

    public function getFirstNameAttribute($value)
    {

        return $this->attributes['first_name'] = ucfirst(strtolower($value));

    }

    public function getLastNameAttribute($value)
    {

        return $this->attributes['last_name'] = ucfirst(strtolower($value));

    }


    public function getNameAttribute()
    {

        return $this->first_name .' '. $this->last_name;
        
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class,'user_id','id');

    }
}
