<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategoryTranslation extends Model
{
    protected $table = 'product_category_translation'; 

    protected $fillable = [
    	'product_category_id',
        'name',
        'locale',
        'description',
        
    ];

    public $timestamps = false;
}
