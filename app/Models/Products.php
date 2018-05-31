<?php

namespace App\Models;

use App\Traits\MetadataTrait;
use App\Traits\ModelEventTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Products extends Model implements Transformable //dung de da ngon ngu
{	
	use \Dimsav\Translatable\Translatable, TransformableTrait, MetadataTrait, ModelEventTrait;

    protected $table = 'product';

    protected static $caches = [
        'all'
    ];

    protected $fillable = [
        'producer_id',
        'unit_price',
        'promotion_price',
        'image',
        'note',
        'active',
        'is_new',
        'rating',
        'unit',
        'status'
    ];

    //translate
    public $translatedAttributes = [
        'name'
    ];

    public function product_category()
    {
    	return $this->belongsToMany(ProductCategory::class,'category_id','id');
    }
    public function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_product','id');
    }

    //phien ban moi
    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class,'category_id','id');
    }
   
    public function photo()
    {
        return $this->hasOne(ProductPhoto::class, 'product_id')
            ->orderBy('level', 'asc')
            ->orderBy('position', 'asc');
    }

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class, 'product_id')
            ->orderBy('level', 'asc')
            ->orderBy('position', 'asc');
    }

    public function _photos()
    {
        return $this->hasMany(ProductPhoto::class, 'product_id')->where(function ($q) {
            return $q->where('level', 0);
        })->orderBy('position', 'asc');
    }
}
