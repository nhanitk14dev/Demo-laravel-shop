<?php namespace App\Traits;

trait UploadPhotoTrait
{
    
    protected function storePhoto($value, array $config)
    {
        $path = $config["path"];
        $info = [];
        $img = null;
        $is_not_svg = true;
        if (!empty($config["base_64"])) {
            $file = str_replace(" ", "+", preg_replace('#data:image/[^;]+;base64,#', '', $value));
            if (strpos($value, 'svg+xml;base64') !== false) {
                $is_not_svg = false;
                $file = base64_decode($file);
            } else {
                $img = \Image::make(base64_decode($file));
            }
        } else {
            $img = \Image::make($value);
        }
        if ($is_not_svg) {
            if (!empty($config["max_width"])) {
                $img->resize($config["max_width"], null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            /*
            if (!empty($config["watermark"])) {
                $img->insert('assets/backend/images/watermark.png', 'center', 10, 10);
            }
            */

            $file_name = uniqid("", true) . date("YmdHis") . str_replace('image/', '.', $img->mime);

            $info["file_name"] = $file_name;
            $info["file_type"] = $img->mime;
            $info["path"] = $path;
            $info["full_path"] = "{$path}/{$file_name}";

            //Save image
            if (!empty($config["sizes"])) {
                # Save full image
                $resource = $img->stream()->detach();
                \Storage::put(
                    "{$path}/{$file_name}",
                    $resource
                );

                if (!empty($config["crop"])) {
                    $fit = false;
                    foreach ($config["sizes"] as $key => $size) {
                        if (!$fit) {
                            $fit = true;
                            $img->fit($size[0], $size[1], function ($constraint) {
                                $constraint->upsize();
                            });
                        } else {
                            $img->resize($size[0], null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                        }
                        $resource = $img->stream()->detach();

                        \Storage::put(
                            "{$path}/{$key}/$file_name",
                            $resource
                        );
                    }
                } else {
                    foreach ($config["sizes"] as $key => $size) {
                        $img->resize($size[0], $size[1], function ($constraint) {
                            $constraint->aspectRatio();
                        });

                        $resource = $img->stream()->detach();

                        \Storage::put(
                            "{$path}/{$key}/$file_name",
                            $resource
                        );
                    }
                }
            } elseif (!empty($config["size"])) {
                $size = $config["size"];
                if (!empty($config["crop"])) {
                    $img->fit($size[0], $size[1], function ($constraint) {
                        $constraint->upsize();
                    });
                } else {
                    $img->resize($size[0], $size[1], function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }

                # Save full image
                $resource = $img->stream()->detach();
                \Storage::put(
                    "{$path}/{$file_name}",
                    $resource
                );
            } else {
                # Save full image
                $resource = $img->stream()->detach();
                \Storage::put(
                    "{$path}/{$file_name}",
                    $resource
                );
            }
        } else {
            $file_name = uniqid("", true) . date("YmdHis") . '.svg';

            $info["file_name"] = $file_name;
            $info["file_type"] = 'image/svg+xml';
            $info["path"] = $path;
            $info["full_path"] = "{$path}/{$file_name}";

            if (!empty($config['sizes'])) {
                foreach ($config["sizes"] as $key => $size) {
                    \Storage::put(
                        "{$path}/{$key}/$file_name",
                        $file
                    );
                }
            }
            \Storage::put(
                "{$path}/{$file_name}",
                $file
            );
        }

        return $info;
    }

    protected function destroySinglePhoto($path, $array = false)
    {
        if (empty($path)) {
            return false;
        }
        if ($array) {
            $arr = assetStorage($path, null, true, null);

            foreach ($arr as $key => $value) {
                \Storage::delete($value);
            }
        } else {
            \Storage::delete($path);
        }
    }
}
