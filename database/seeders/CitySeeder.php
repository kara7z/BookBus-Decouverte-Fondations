<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cities')->insert([
            ['name' => 'Casablanca', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rabat',      'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Settat',     'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Marrakech',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Agadir',     'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
