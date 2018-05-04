<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    public function order_detail(){
    	return $this->hasMany(OrderDetail::class);
    }

    public function users()
    {
    	return $this->belongsTo(User::class);
    }
}
