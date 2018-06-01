<?php

namespace App\Models;

use App\Traits\MetadataTrait;
use App\Traits\ModelEventTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Product extends Model implements Transformable //dung de da ngon ngu
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
        'status',
        'remark',
        'start_date_promotion',
        'end_date_promotion',
    ];
    
    //translate
    public $translatedAttributes = [
        'name'
    ];

    public function product_category()
    {
    	return $this->belongsToMany(ProductCategory::class,'category_id','id');
    }

    public function getPhotoPathMediumAttribute()
    {
        return $this->photo && $this->photo->media ? $this->photo->media->img_medium : DEFAULT_IMAGE;
    }
    

    public function getPhotoPathSmallAttribute()
    {
        return $this->photo && $this->photo->media ? $this->photo->media->img_small : DEFAULT_IMAGE;
    }


    public function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_product','id');
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, "product_category", "product_id", "category_id");
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
