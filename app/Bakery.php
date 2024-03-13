<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bakery extends Model
{
    protected $table = "bakeries";

    public function cakegory(){
    	return $this->belongsTo('App\Cakegory');
    }

    public function sizes(){
    	return $this->hasMany('App\Size', 'sizes', 'bakery_id');
    }
}
