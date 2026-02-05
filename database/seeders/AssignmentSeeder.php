<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignmentSeeder extends Seeder
{
    public function run(): void
    {
        $trips = DB::table('trips')->select('id')->get();

        $buses = DB::table('buses')
            ->where('status', '!=', 'horsservice')
            ->pluck('id')
            ->toArray();

        $drivers = DB::table('employees')
            ->where('role', 'driver')
            ->pluck('id')
            ->toArray();

        if (empty($buses) || empty($drivers)) {
            return;
        }

        $rows = [];
        foreach ($trips as $i => $trip) {
            $rows[] = [
                'trip_id'     => $trip->id,
                'bus_id'      => $buses[$i % count($buses)],
                'employee_id' => $drivers[$i % count($drivers)],
                'created_at'  => now(),
                'updated_at'  => now(),
            ];
        }

        DB::table('assignments')->insert($rows);
    }
}
