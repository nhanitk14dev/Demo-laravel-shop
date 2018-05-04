<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    use \Dimsav\Translatable\Translatable;

    protected $table = "metadata";

    public $translatedAttributes = ['title', 'description', 'key_word'];

    protected $fillable = ['meta_key', 'object_id'];
}
