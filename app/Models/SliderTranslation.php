<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class SliderTranslation.
 *
 * @package namespace App\Entities;
 */
class SliderTranslation extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = "slider_translation";

     protected $fillable = [
         "name",
         "link",
         'photo_translation'
         "description",
         "content"
     ];

}
