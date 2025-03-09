<?php

namespace Database\Seeders;

use App\Models\Stop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stops = [
            ['name' => 'ул. Некрасова'],
            ['name' => 'ул. Рубенштейна'],
            ['name' => 'ул. Стетхема'],
            ['name' => 'ул. Бейкер-стрит'],
            ['name' => 'ул. Оушен-Драйв']
        ];

        foreach ($stops as $stop) Stop::create($stop);
    }
}
