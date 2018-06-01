<?php

namespace App\Models;

use App\Traits\PhotoArrayPathTrait;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use PhotoArrayPathTrait;

    protected $table = "media";

    protected $fillable = [
        "id",
        "name",
        "file_name",
        "type",
        "file_size",
        "path",
        "mime",
        "ext"
    ];

    public function products(){
        return $this->belongsToMany(Product::class, 'media_object', 'media_id', 'object_id')
        ->where('media_object.type', 'product');
    }
}
