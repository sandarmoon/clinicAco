<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
	use SoftDeletes;
    protected $fillable=['medicine_id','qty','unit1','unit2','unit3','unit4','expire_date'];

    public function medicine(){
    	return $this->belongsTo('App\Medicine');
    }

}
