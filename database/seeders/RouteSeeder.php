<?php

namespace Database\Seeders;

use App\Models\Route;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $routes = [
            ['number' => '1', 'direction' => 'ул. Гослинга'],
            ['number' => '12', 'direction' => 'ул. Стетхема'],
            ['number' => '6', 'direction' => 'хорошей жизни']
        ];
        foreach ($routes as $route) Route::create($route);
    }
}
