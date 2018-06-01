<?php

namespace App\Models;

use App\Traits\PhotoArrayPathTrait;
use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    use PhotoArrayPathTrait;

    protected $table = 'product_photo';

    protected $fillable = [
        'product_id',
        'path',
        'file_name',
        'file_type',
        'position',
        'level'
    ];

    public $timestamps = false;

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
