<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripSeeder extends Seeder
{
    public function run(): void
    {
        $schedules = DB::table('schedules')->select('id')->get();

        $rows = [];
        foreach ($schedules as $schedule) {
            // create 3 trips per schedule (next 3 days)
            for ($d = 1; $d <= 3; $d++) {
                $rows[] = [
                    'schedule_id' => $schedule->id,
                    'trip_date'   => now()->addDays($d)->toDateString(),
                    'status'      => 'planned',
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ];
            }
        }

        DB::table('trips')->insert($rows);
    }
}
