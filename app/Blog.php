<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];


    public function getSubjectAttribute($value)
    {
        return $this->attributes['subject'] = ucfirst(strtolower($value));
    }

    public function getMessageAttribute($value)
    {
        return $this->attributes['message'] = ucfirst(strtolower($value));
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');

    }
}
