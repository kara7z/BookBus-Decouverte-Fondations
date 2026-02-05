<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RouteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('routes')->insert([
            ['code' => 'L101', 'name' => 'Casa - Settat - Marrakech', 'description' => 'Main SATAS line', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'L102', 'name' => 'Casa - Rabat',              'description' => null,            'created_at' => now(), 'updated_at' => now()],
            ['code' => 'L103', 'name' => 'Rabat - Casablanca',        'description' => null,            'created_at' => now(), 'updated_at' => now()],
            ['code' => 'L104', 'name' => 'Rabat - Marrakech',         'description' => null,            'created_at' => now(), 'updated_at' => now()],
            ['code' => 'L105', 'name' => 'Casa - Agadir',             'description' => null,            'created_at' => now(), 'updated_at' => now()],
            ['code' => 'L106', 'name' => 'Agadir - Marrakech',        'description' => null,            'created_at' => now(), 'updated_at' => now()],
            ['code' => 'L107', 'name' => 'Settat - Casablanca',       'description' => null,            'created_at' => now(), 'updated_at' => now()],
            ['code' => 'L108', 'name' => 'Settat - Marrakech',        'description' => null,            'created_at' => now(), 'updated_at' => now()],
            ['code' => 'L109', 'name' => 'Casablanca - Marrakech',    'description' => null,            'created_at' => now(), 'updated_at' => now()],
            ['code' => 'L110', 'name' => 'Rabat - Agadir',            'description' => null,            'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
