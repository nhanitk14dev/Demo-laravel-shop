<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTypeTranslation extends Model
{
    protected $table = "products_type_translation";

    protected $fillable = [
        "name",
        "description",
        "product_type_id",
        
    ];

    public $timestamps = false;
}
