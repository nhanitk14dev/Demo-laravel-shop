<?php

use Illuminate\Database\Seeder;

class LocationDataSeeder extends Seeder
{
    /**
     * Run seed to create location
     *
     * @return void
     */
    public function run()
    {
		\Eloquent::unguard();
        $path = 'database/seeds/country_city.sql';
        \DB::unprepared(file_get_contents($path));
        $this->command->info('Location table seeded!');
    }
}
