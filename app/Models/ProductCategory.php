<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CatalogueTrait;
use App\Traits\MetadataTrait;
use App\Traits\ModelEventTrait;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProductCategory extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TransformableTrait, MetadataTrait, CatalogueTrait, ModelEventTrait;


    protected $table = 'product_categories';

    protected $fillable = [
        'product_id',
        'image',
        'parent_id',
        'icon',
        'level',
        'style',
        'image',
        'position',
        'banner',
        'is_display'
    ];

    public $translatedAttributes = [
        'name',
        'slug',
        'description',
        
    ];

    public function product()
    {
    	return $this->belongsToMany(Products::class,'id_type','id');
    }

    //ddkien parent_id.Product = id.ProductCategory
    public function children()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id', 'id')
            ->orderBy('level', 'asc')
            ->orderBy('position', 'asc')
            ->orderBy('id', 'asc');
    }

    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id', 'id');
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
