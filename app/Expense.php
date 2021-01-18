<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Expense extends Model
{
    use SoftDeletes;
    protected $fillable=['date','description','amount','files','owner_id','category_id'];

    public function category(){
    	return $this->belongsTo('App\Category');
    }
}
