<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "order_detail";

    public $timestamps = false;

     public function products_type()
    {
    	return $this->belongsTo(ProductType::class);
    }

    public function orders()
    {
    	return $this->belongsTo(Order::class);
    }
}
