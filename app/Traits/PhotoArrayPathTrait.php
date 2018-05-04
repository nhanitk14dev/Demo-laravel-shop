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
}
