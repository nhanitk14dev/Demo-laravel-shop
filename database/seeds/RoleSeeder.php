<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Models\Role::where("slug", "admin")->first();
        if(!$admin){
            $arr = [
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => '', // optional
                'level' => 100, // optional, set to 1 by default level cao co permission level thap
            ];
            $admin = \App\Models\Role::create($arr);

        }
        else{
            $admin->update(['level' => 100]);
        }
        $permissions = \App\Models\Permission::get()->pluck("id")->toArray();
        $admin->syncPermissions($permissions);

        $user = \App\Models\Role::where("slug", "user")->first();
        if(!$user){
            $arr = [
                'name' => 'User',
                'slug' => 'user',
                'description' => '', // optional
                'level' => 1, // optional, set to 1 by default
            ];
            \App\Models\Role::create($arr);
        }
    }
}
