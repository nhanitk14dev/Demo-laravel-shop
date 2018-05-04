<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CatalogueTrait;
use App\Traits\MetadataTrait;
use App\Traits\ModelEventTrait;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProductType extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TransformableTrait, MetadataTrait, CatalogueTrait, ModelEventTrait;


    protected $table = 'type_products';

    protected $fillable = [
        'name',
        'description',
        'image',
        'parent_id',
        'icon',
        'level',
        'style',
        'image_1',
        'position'
    ];

    public $translatedAttributes = [
        'name',
        'slug',
        'short_description',
        'description',
        'alias_name',
        
    ];

    public function product()
    {
    	return $this->belongsToMany(Products::class,'id_type','id');
    }

    //ddkien parent_id.Product = id.ProductType
    public function children()
    {
        return $this->hasMany(ProductType::class, 'parent_id', 'id')
            ->orderBy('level', 'asc')
            ->orderBy('position', 'asc')
            ->orderBy('id', 'asc');
    }

    public function parent()
    {
        return $this->belongsTo(ProductType::class, 'parent_id', 'id');
    }

    public static function getStyles($key = null)
    {
        $arr = [
          "style_1" => trans("admin_product_category.attr.style_1"),
          "style_2" => trans("admin_product_category.attr.style_2")
          /*"style_3" => trans("admin_product_category.attr.style_3"),
          "style_4" => trans("admin_product_category.attr.style_4")*/
        ];

        if ($key !== null && !empty($arr[$key])) {
            return $arr[$key];
        }
        return $arr;
    }
}
