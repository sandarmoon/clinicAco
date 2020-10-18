<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;
use DB;

class Treatment extends Model
{
	use SoftDeletes,EagerLoadPivotTrait;
     protected $fillable = ['file','gc_level','temperature','body_weight','spo2','pr','bp','rbs','complaint','examination','relevant_info','chronic_disease','diagnosis','external_medicine','next_visit_date','next_visit_date2','patient_id','doctor_id','charges'];


      public function medicines()
    {
        return $this->belongsToMany('App\Medicine')
        			->withPivot('tab', 'interval','meal','during','type')
        			->withTimestamps();	
    }

    // public function groupedMedicine()
    // {
    //    return $this->belongsToMany('App\Medicine')
    //           ->withPivot('tab', 'interval','meal','during','type')
    //           ->withTimestamps(); 
    // }

    public function patient($value='')
    {
     return $this->belongsTo('App\Patient');
    }

    public function doctor($value='')
    {
     return $this->belongsTo('App\Doctor');
    }

    public function owner(){
      return $this->hasManyThrough('App\Owner','App\Doctor');
    }
}

