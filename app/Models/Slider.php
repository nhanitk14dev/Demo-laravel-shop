<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Slider.
 *
 * @package namespace App\Entities;
 */
class Slider extends Model implements Transformable
{
    use \Dimsav\Translatable\Translatable, TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'sliders';

    protected $fillable = [
      'key',
      'position',
      'image',
      'expr_from',
      'expr_to'
    ];

    public $translatedAttributes = [
        'name',
        'link',
        'photo_translation',
        'description',
        'content'
    ];

    public function setKeyAttribute($value)
    {
        $this->attributes['key'] = strtoupper(str_slug(trim($value)));
    }

}
