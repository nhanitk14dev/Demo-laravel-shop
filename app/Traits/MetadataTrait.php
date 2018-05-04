<?php namespace App\Traits;

use App\Models\Metadata;

trait MetadataTrait
{
    public function meta()
    {
        $meta_key = $this->table;
        return $this->hasOne(Metadata::class, "object_id")->where(function ($q) use ($meta_key) {
            return $q->where("meta_key", $meta_key);
        });
    }

    public function metaCreateOrUpdate($input)
    {
        $input["meta_key"] = $this->table;
        if ($this->meta) {
            return $this->meta->update($input);
        }
        return $this->meta()->create($input);
    }
}
