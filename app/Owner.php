<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Owner extends Model
{
    use SoftDeletes;
    protected $fillable=['user_id','nrc','age','dob','avatar','clinic_name','clinic_logo','clinic_time','address','phone'];

    public function doctors(){
    	return $this->hasMany('App\Doctor');
    }

    public function receptions(){
    	return $this->hasMany('App\Reception');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function treatments(){
        return $this->hasManyThrough('App\Treatment','App\Doctor');
    }

     public function appointments(){
        return $this->hasManyThrough('App\Appointment','App\Doctor');
    }
}
