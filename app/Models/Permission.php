<?php

namespace App\Models;

use Ultraware\Roles\Models\Permission as UltrawarePermission;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Permission extends UltrawarePermission implements Transformable
{
    protected $table = "permissions";
    protected $hidden = [
        "created_at",
        "updated_at"
    ];
    use TransformableTrait;
}
