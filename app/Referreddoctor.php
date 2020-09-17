<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Doctor;
use App\Treatment;
class Referreddoctor extends Model
{
    use SoftDeletes;
    protected $fillable=['from_doctor_id','to_doctor_id','patient_id','reason'];

     public function patient(){
        return $this->belongsTo('App\Patient');
    }

    public function fromDoctor(){
    	return $this->belongsTo('App\Doctor','from_doctor_id');
    }

    public function toDoctor(){
    	return $this->belongsTo('App\Doctor','to_doctor_id');
    }

    
}
