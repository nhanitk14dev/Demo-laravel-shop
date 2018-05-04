<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::where("email", "admin@shopcake.vn")->first();
        if(!$user){
            $arr = [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@shopcake.vn',
                "password" => \Hash::make("12345667"),
                "last_logon"=>'2018-02-14 00:00:00',
                'active'=>1,
                'active_code'=>84,
                'social_login'=>'',
                'social_id'=>''
            ];

            $user = \App\Models\User::create($arr);

        }
        $admin = \App\Models\Role::where("slug", "admin")->first();
        if($admin){
            $user->syncRoles([$admin->id]);
        }
    }
}
