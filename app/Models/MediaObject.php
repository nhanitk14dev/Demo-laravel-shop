<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaObject extends Model
{

    protected $table = "media_object";

    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'object_id');
    }

    public function getCustomNameAttribute()
    {
        return $this->media->products
            ->map(function($product){
                return $product->code; 
            })->implode('_').'_'.$this->media_id; 
    }
}
