<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Size extends Model //implements Transformable
{
   // use TransformableTrait;

    protected $table = 'size';

    protected $fillable = [
        'name',
        'size'
    ];

    public function products(){
        return $this->hasMany(Product::class, 'size_id');
    }
}
