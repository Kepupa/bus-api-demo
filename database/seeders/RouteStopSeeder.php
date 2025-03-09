<?php

namespace Database\Seeders;

use App\Models\Route;
use App\Models\RouteStop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RouteStopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $route1 = Route::where('number', '6')->where('direction', 'хорошей жизни')->first();

        $route1->stops()->attach([
            1 => ['sequence' => 1],
            2 => ['sequence' => 2],
            3 => ['sequence' => 3],
            4 => ['sequence' => 4],
            5 => ['sequence' => 5]
        ]);

        $route2 = Route::where('number', '1')->where('direction', 'ул. Гослинга')->first();

        $route2->stops()->attach([
            5 => ['sequence' => 1],
            4 => ['sequence' => 2],
            3 => ['sequence' => 3],
            2 => ['sequence' => 4],
            1 => ['sequence' => 5]
        ]);

        $route3 = Route::where('number', '12')->where('direction', 'ул. Стетхема')->first();

        $route3->stops()->attach([
            2 => ['sequence' => 1],
            5 => ['sequence' => 2],
            3 => ['sequence' => 3],
            1 => ['sequence' => 4]
        ]);

        $route4 = Route::where('number', '12')->where('direction', 'ул. Стетхема')->first();

        $route4->stops()->attach([
            2 => ['sequence' => 1],
            5 => ['sequence' => 2],
            3 => ['sequence' => 3],
            1 => ['sequence' => 4]
        ]);
    }
}
