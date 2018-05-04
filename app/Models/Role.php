<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Ultraware\Roles\Models\Role as UltrawareRole;

class Role extends UltrawareRole implements Transformable
{
    use TransformableTrait;

    protected $table = "roles";

    protected $hidden = [
        "created_at",
        "updated_at"
    ];
}
