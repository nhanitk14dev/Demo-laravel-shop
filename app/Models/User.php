<?php

namespace App\Models;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Ultraware\Roles\Traits\HasRoleAndPermission;
use Ultraware\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Authenticatable implements  Transformable, HasRoleAndPermissionContract
{
     use Notifiable, TransformableTrait, HasRoleAndPermission;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        "name",
        "email",
        "password",
        "remember_token",
        "gender",
        "birthday",
        "last_logon",
        "social_login",
        'social_id',
        "active_code",
        "active",
        "avatar",
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        //ko them khoa ngoai ko thi bi loi seed
        return $this->belongsToMany(Role::class);
    }

    public function orderdetail(){
        return $this->hasManyThrough('App\Models\OrderDetail', 'App\Models\Order','user_id','order_id','id');
    }

    public function userdetail(){
        return $this->hasOne(UserDetail::class);
    }
}
