<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@satas.ma'],
            [
                'name' => 'SATAS Admin',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]
        );

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

            OfferSeeder::class,
        ]);
    }
}
