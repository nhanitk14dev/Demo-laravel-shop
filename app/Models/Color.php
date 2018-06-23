<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Color extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TransformableTrait;

    protected $table = 'color';

    protected $fillable = [
        'position'
    ];

    public $translatedAttributes = [
        'name'
    ];

    public function products(){
        return $this->hasMany(Product::class, 'color_id');
    }

}
