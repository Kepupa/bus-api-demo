<?php

namespace Database\Seeders;

use App\Models\Route;
use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $route1 = Route::where('number', '6')->where('direction', 'хорошей жизни')->first();

        $stops1 = $route1->stops;

        Schedule::create([
            'route_id' => $route1->id,
            'stop_id' => $stops1[0]->id, // ул. Пушкина
            'arrival_time' => '08:00',
        ]);
        Schedule::create([
            'route_id' => $route1->id,
            'stop_id' => $stops1[1]->id, // ост. Попова
            'arrival_time' => '08:15',
        ]);
        Schedule::create([
            'route_id' => $route1->id,
            'stop_id' => $stops1[2]->id, // ост. Садовая
            'arrival_time' => '08:30',
        ]);
        Schedule::create([
            'route_id' => $route1->id,
            'stop_id' => $stops1[3]->id, // ул. Ленина
            'arrival_time' => '08:45',
        ]);
        Schedule::create([
            'route_id' => $route1->id,
            'stop_id' => $stops1[4]->id, // ул. Ленина
            'arrival_time' => '9:00',
        ]);

        $route3 = Route::where('number', '12')->where('direction', 'ул. Стетхема')->first();

        $stops3 = $route3->stops;

        Schedule::create([
            'route_id' => $route3->id,
            'stop_id' => $stops3[0]->id, // ул. Пушкина
            'arrival_time' => '08:00',
        ]);
        Schedule::create([
            'route_id' => $route3->id,
            'stop_id' => $stops3[1]->id, // ост. Попова
            'arrival_time' => '08:15',
        ]);
        Schedule::create([
            'route_id' => $route3->id,
            'stop_id' => $stops3[2]->id, // ост. Садовая
            'arrival_time' => '08:30',
        ]);
        Schedule::create([
            'route_id' => $route3->id,
            'stop_id' => $stops3[3]->id, // ул. Ленина
            'arrival_time' => '08:45',
        ]);

        $route2 = Route::where('number', '1')->where('direction', 'ул. Гослинга')->first();

        $stops2 = $route2->stops;

        Schedule::create([
            'route_id' => $route2->id,
            'stop_id' => $stops2[0]->id, // ул. Пушкина
            'arrival_time' => '08:00',
        ]);
        Schedule::create([
            'route_id' => $route2->id,
            'stop_id' => $stops2[1]->id, // ост. Попова
            'arrival_time' => '08:15',
        ]);
        Schedule::create([
            'route_id' => $route2->id,
            'stop_id' => $stops2[2]->id, // ост. Садовая
            'arrival_time' => '08:30',
        ]);
        Schedule::create([
            'route_id' => $route2->id,
            'stop_id' => $stops2[3]->id, // ул. Ленина
            'arrival_time' => '08:45',
        ]);
        Schedule::create([
            'route_id' => $route2->id,
            'stop_id' => $stops2[4]->id, // ул. Ленина
            'arrival_time' => '9:00',
        ]);

        $route4 = Route::where('number', '12')->where('direction', 'ул. Стетхема')->first();

        $stops4 = $route4->stops;

        Schedule::create([
            'route_id' => $route4->id,
            'stop_id' => $stops4[0]->id, // ул. Пушкина
            'arrival_time' => '09:00',
        ]);
        Schedule::create([
            'route_id' => $route4->id,
            'stop_id' => $stops4[1]->id, // ост. Попова
            'arrival_time' => '09:15',
        ]);
        Schedule::create([
            'route_id' => $route4->id,
            'stop_id' => $stops4[2]->id, // ост. Садовая
            'arrival_time' => '09:30',
        ]);
        Schedule::create([
            'route_id' => $route4->id,
            'stop_id' => $stops4[3]->id, // ул. Ленина
            'arrival_time' => '9:45',
        ]);
    }
}
