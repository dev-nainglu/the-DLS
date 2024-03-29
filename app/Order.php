<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    public function items(){
    	return $this->belongsToMany('App\Bakery', 'order_items', 'order_id');
    }

    public function order_items(){
    	return $this->hasMany('App\OrderItem');
    }

}
