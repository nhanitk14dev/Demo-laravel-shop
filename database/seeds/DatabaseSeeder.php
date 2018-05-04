<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        /*DB::table('users')->insert([
            'name' =>'nhan','email'=>'nhanitk1@gmail.com','password'=>Hash::make('140896nhan'),'phone'=>'00000000010','address'=>'SGU ktx 18A Nguyen Kim'
        ]);*/
    }
}

