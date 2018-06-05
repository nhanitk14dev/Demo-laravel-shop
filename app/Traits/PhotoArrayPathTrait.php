<?php namespace App\Traits;

trait PhotoArrayPathTrait
{
    public function arrayPath($fullPath = true)
    {
        $array = [];

        $array["small"] = "{$this->path}/small/{$this->file_name}";
        $array["medium"] = "{$this->path}/medium/{$this->file_name}";
        $array["large"] = "{$this->path}/large/{$this->file_name}";
        $array["full"] = "{$this->path}/{$this->file_name}";

        if ($fullPath) {
            $array["small"] = asset("storage/" . $array["small"]);
            $array["medium"] = asset("storage/" . $array["medium"]);
            $array["large"] = asset("storage/" . $array["large"]);
            $array["full"] = asset("storage/" . $array["full"]);
        }

        return $array;
    }

    public function ImgSources($size = null) {
        $array = [];
        $array["small"] = "storage/{$this->path}/small/{$this->file_name}";
        $array["medium"] = "storage/{$this->path}/medium/{$this->file_name}";
        $array["large"] = "storage/{$this->path}/large/{$this->file_name}";
        $array["full"] = "storage/{$this->path}/{$this->file_name}";
        if($size && !empty($array[$size]))
            return $array[$size];
        return $array;
    }

    public function linkImg($name, $size = 'medium'){
        $source = $this->ImgSources($size);
        return route('download.custom_name', [
            'name' => $name.'.'.$this->ext,
            'source' => $source
        ]);
    }

    public function getImgLargeAttribute()
    {
        return asset("storage/{$this->path}/large/{$this->file_name}");
    }

    public function getImgMediumAttribute()
    {
        return asset("storage/{$this->path}/medium/{$this->file_name}");
    }

    public function getImgSmallAttribute()
    {
        return asset("storage/{$this->path}/small/{$this->file_name}");
    }


}
