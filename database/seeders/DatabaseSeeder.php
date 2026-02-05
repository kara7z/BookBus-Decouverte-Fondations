<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name'  => 'SATAS Admin',
            'email' => 'admin@satas.ma',
        ]);

        $this->call([
            CitySeeder::class,
            GareSeeder::class,

            RouteSeeder::class,
            StopSeeder::class,
            SegmentSeeder::class,
            FareSeeder::class,

            BusSeeder::class,
            EmployeeSeeder::class,

            ScheduleSeeder::class,
            TripSeeder::class,
            AssignmentSeeder::class,
        ]);
    }
}
