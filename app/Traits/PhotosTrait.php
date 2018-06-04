<?php

namespace App\Traits;


trait PhotosTrait
{
    public function photos()
    {
        $table = $this->table;
        return $this->hasMany($this->model_photos, "object_id")->where(function ($q) use ($table) {
            return $q->where("type", $table);
        })->orderBy('position', 'asc')->orderBy('id', 'asc');
    }

    public function getImagesPathAttribute()
    {
        $array = [];
        foreach ($this->photos as $photo) {
            $array[] = [
                'small' => asset("storage/" . $photo->small),
                'medium' => asset("storage/" . $photo->medium),
                'large' => asset("storage/" . $photo->large)
            ];
        }
        return $array;
    }

    public function storePhotos(array $arr, $config)
    {
        foreach ($arr as $key => $value) {
            if (!empty($value)) {
                $info = storePhotoToStorage($value, $config);
                $input = [
                    'small' => $info['small'],
                    'medium' => $info['medium'],
                    'large' => $info['large'],
                    'object_id' => $this->id,
                    'type' => $this->table,

                ];
                $this->photos()->create($input);
            }
        }
    }

    public function deletePhotos(array $ids, $all = false)
    {
        if ($all === true) {
            $photos = $this->photos;
        } else {
            $photos = $this->photos()->whereIn("id", $ids)->get();
        }
        foreach ($photos as $photo) {
            $photo->deletePhoto();
        }
    }
}