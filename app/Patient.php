<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Patient extends Model
{
	use SoftDeletes;
    protected $fillable = ['PRN','name','fatherName','age','chind', 'gender','phoneno','address','married_status','status','pregnant', 'body_weight',
    'allergy','job','file','reception_id'
    ];

    public function treatments($value='')
    {
    	return $this->hasMany('App\Treatment');
    }

    public function referredPatient(){
    	return $this->hasMany('App\Referreddoctor','patient_id');
    }
    public function reception(){
    	return $this->belongsTo('App\Reception');
    }
}
