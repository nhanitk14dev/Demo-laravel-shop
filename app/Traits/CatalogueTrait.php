<?php namespace App\Traits;

use App\Models\Catalogue;

trait CatalogueTrait
{
    public function catalogues()
    {
        $catalogue_key = $this->table;
        return $this->hasMany(Catalogue::class, "object_id")->where(function ($q) use ($catalogue_key) {
            return $q->where("catalogue_key", $catalogue_key);
        });
    }

    public function storeCatalogues(array $arr)
    {
        $locales = config("laravellocalization.supportedLocales");
        $config = config("photos.catalogue");

        $config_image = config("photos.catalogue_image");
        foreach ($arr as $key => $value) {
            $check = true;
            foreach ($locales as $code => $name) {
                if (empty($value[$code]["file"]) || empty($value[$code]["name"])) {
                    $check = false;
                    break;
                }
            }
            if (!$check) {
                continue;
            }

            $input = [];
            if (!empty($value['image'])) {
                $img = \Image::make($value['image']);

                $file_name = uniqid("", true) . str_replace('image/', '.', $img->mime);

                if (!empty($config_image['max_width'])) {
                    if ($img->width() > $config_image['max_width']) {
                        $img->resize($config_image['max_width'], null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    }
                }

                if (!empty($config_image['size'])) {
                    $size = $config_image['size'];
                    $img->fit($size[0], $size[1], function ($constraint) {
                        $constraint->upsize();
                    });
                }

                # Save full image
                $resource = $img->stream()->detach();
                \Storage::put(
                    "{$config_image['path']}/{$file_name}",
                    $resource
                );
                $input["image"] = "{$config_image['path']}/{$file_name}";
            }

            foreach ($locales as $code => $name) {
                $input[$code]["size"] = $value[$code]["file"]->getClientSize() / 1024; // KB
                $input[$code]["ext"] = $value[$code]["file"]->extension();
                $input[$code]["name"] = $value[$code]["name"];
                $path = \Storage::putFile($config["path"], $value[$code]["file"]);
                $input[$code]["path"] = $path;
            }
            $input["object_id"] = $this->id;
            $input["catalogue_key"] = $this->table;
            $this->catalogues()->create($input);
        }
    }

    public function deleteCatalogues(array $ids, $all = false)
    {
        if ($all === true) {
            $catalogues = $this->catalogues;
        } else {
            $catalogues = $this->catalogues()->whereIn("id", $ids)->get();
        }
        $locales = config("laravellocalization.supportedLocales");

        foreach ($catalogues as $catalogue) {
            foreach ($locales as $code => $name) {
                if (!empty($catalogue->{"path:{$code}"}))
                {
                    \Storage::delete($catalogue->{"path:{$code}"});
                }
            }
            if (!empty($catalogue->image)) {
                \Storage::delete($catalogue->image);
            }
            $catalogue->delete();
        }
    }
}
