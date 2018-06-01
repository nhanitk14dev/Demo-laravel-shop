<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductTranslation extends Model
{
    use Sluggable;

    protected $table = 'product_translation';

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'name',
        'slug',
        'locale'
    ];


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
