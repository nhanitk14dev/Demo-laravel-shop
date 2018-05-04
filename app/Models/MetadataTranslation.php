<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetadataTranslation extends Model
{
    protected $table = "metadata_translations";

    public $timestamps = false;

    protected $fillable = ['title', 'description', 'key_word'];
}
