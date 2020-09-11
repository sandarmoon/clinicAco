<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
	use SoftDeletes;
    protected $fillable=['user_id','owner_id','nrc','age','dob','degree','certificate','license','experience','avatar','address','phone'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function owner(){
        return $this->belongsTo('App\Owner');
    }

    public function referredBy(){
    	return $this->hasMany('App\Referreddoctor','from_doctor_id');
    }

    public function referredFrom(){
    	return $this->hasMany('App\Referreddoctor','to_doctor_id');
    }
}
