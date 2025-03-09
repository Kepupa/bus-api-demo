<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            StopSeeder::class,
            RouteSeeder::class,
            RouteStopSeeder::class,
            ScheduleSeeder::class,
        ]);
    }
}
