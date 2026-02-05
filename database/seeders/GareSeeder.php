<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GareSeeder extends Seeder
{
    public function run(): void
    {
        $cityId = fn(string $name) => DB::table('cities')->where('name', $name)->value('id');

        DB::table('gares')->insert([
            ['name' => 'Casa Voyageurs', 'location' => 'Casablanca', 'city_id' => $cityId('Casablanca'), 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ain Sebaa',      'location' => 'Casablanca', 'city_id' => $cityId('Casablanca'), 'created_at' => now(), 'updated_at' => now()],

            ['name' => 'Rabat Ville',    'location' => 'Rabat',      'city_id' => $cityId('Rabat'),      'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Agdal',          'location' => 'Rabat',      'city_id' => $cityId('Rabat'),      'created_at' => now(), 'updated_at' => now()],

            ['name' => 'Settat Gare',    'location' => 'Settat',     'city_id' => $cityId('Settat'),     'created_at' => now(), 'updated_at' => now()],

            ['name' => 'Marrakech Gare', 'location' => 'Marrakech',  'city_id' => $cityId('Marrakech'),  'created_at' => now(), 'updated_at' => now()],

            ['name' => 'Agadir Gare',    'location' => 'Agadir',     'city_id' => $cityId('Agadir'),     'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
