<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $routes = DB::table('routes')->select('id')->get();
        $times = ['07:30:00','09:00:00','12:00:00','15:30:00','18:00:00'];

        $rows = [];
        foreach ($routes as $route) {
            // 2 schedules per route
            $rows[] = ['route_id' => $route->id, 'departure_time' => $times[array_rand($times)], 'created_at' => now(), 'updated_at' => now()];
            $rows[] = ['route_id' => $route->id, 'departure_time' => $times[array_rand($times)], 'created_at' => now(), 'updated_at' => now()];
        }

        DB::table('schedules')->insert($rows);
    }
}
