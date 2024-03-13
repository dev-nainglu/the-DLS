<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cakegory extends Model
{
    protected $table = "cakegories";

    public function bakes(){
    	return $this->hasMany('App\Bakery');
    }

    public function sizes(){
    	return $this->hasMany('App\Size', 'cakegory_id');
    }
}
