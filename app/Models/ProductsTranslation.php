<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductsTranslation extends Model
{
    use Sluggable;

    protected $table = 'products_translation';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'remark',
        'slug'
    ];

    public $translatedAttributes = array('name','remark','slug');


    //public $translationModel = 'MyApp\Models\CountryAwesomeTranslation';
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'unique' => false
            ]
        ];
    }
}
