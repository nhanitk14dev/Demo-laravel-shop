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

    protected $table = "products";

    protected static $caches = [
        'all'
    ];

    protected $fillable = [
        "name_old",
        "id_type",
        "description",
        "unit_price",
        "promotion_price",
        "image",
        "unit",
        "new",
        "is_new",
        "color_id",
        "size_id",
        "setting_id",
        "temperature"
    ];

    //translate
    public $translatedAttributes = [
        "slug",
        "name",
        'remark'
    ];

    public function product_type()
    {
    	return $this->belongsToMany(ProductType::class,'id_type','id');
    }
    public function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_product','id');
    }

    //phien ban moi
    public function categories()
    {
        return $this->belongsToMany(ProductType::class,'id_type','id');
    }
   
    public function photo()
    {
        return $this->hasOne(ProductPhoto::class, "product_id")
            ->orderBy("level", "asc")
            ->orderBy("position", "asc");
    }

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class, "product_id")
            ->orderBy("level", "asc")
            ->orderBy("position", "asc");
    }

    public function _photos()
    {
        return $this->hasMany(ProductPhoto::class, "product_id")->where(function ($q) {
            return $q->where('level', 0);
        })->orderBy("position", "asc");
    }
}
