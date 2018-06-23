<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColorTranslation extends Model
{
    protected $table = "color_translation";

    protected $fillable = [
        "name"
    ];

    public $timestamps = false;
}
