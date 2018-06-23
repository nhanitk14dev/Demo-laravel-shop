<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    protected $table = "page_translation";

    protected $fillable = [
        'title',
        'description',
        'content',
        'slug'
    ];

    public $timestamps = false;
}
