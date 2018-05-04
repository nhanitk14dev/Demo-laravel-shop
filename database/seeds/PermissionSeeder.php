<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions  = config("permission");

        foreach ($permissions as $permission){
            foreach ($permission["permissions"] as $key => $name){
                $check = \App\Models\Permission::where("slug", $key)->first();
                if(!$check){
                    $arr = [
                        "model" => $permission["model"],
                        "slug" => $key,
                        "name" => $name,
                        "description" => $name
                    ];
                    \App\Models\Permission::create($arr);
                }
            }
        }
    }
}
