<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Monthlymedicine extends Model
{
    //
    use SoftDeletes;
    protected  $fillable=['medicine_id','emdate','qty'];

    public function medicine(){
    	return $this->belongsTo('App\Medicine');
    }
}
