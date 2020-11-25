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
    public function patients(){
        return $this->hasManyThrough('App\Patient','App\Reception');
    }

    public function medicines(){
        return $this->hasMany('App\Medicine');
    }

    public function stocks(){
        return $this->hasManyThrough('App\Stock','App\Medicine');
    }

    public function monthlymedicines(){
        return $this->hasManyThrough('App\Monthlymedicine','App\Medicine');
    }

     protected static function boot() 
    {
       parent::boot();

       static::deleting(function($owner) {

        




        $stocks=$owner->stocks;
        foreach ($stocks as $v) {
            $v->delete();
        }

        $medicines=$owner->medicines;
         foreach ($medicines as $v) {
            $v->delete();
        }
        

        $treatments=$owner->treatments;

        foreach ($treatments as $v) {
            $v->medicines()->detach();
            $v->delete();
        }

        $appointments=$owner->appointments;
        foreach ($appointments as $v) {
            $v->delete();
        }

        $treatments=$owner->treatments;

        foreach ($treatments as $v) {
            $v->medicines()->detach();
            $v->delete();
        }

        $patients=$owner->patients;
        foreach ($patients as $v) {
            $v->delete();
        }

        $doctors=$owner->doctors;
        foreach ($doctors as $v) {
            $v->user->removeRole('Doctor');
            $v->delete();
        }

        $receptions=$owner->receptions;
        foreach ($receptions as $v) {
            $v->user->removeRole('Reception');
            $v->delete();
        }
        $owner->user->removeRole('Admin');
        $owner->user->delete();


       
        
        
        
       });
    }
}
