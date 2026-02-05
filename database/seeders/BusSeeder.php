<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusSeeder extends Seeder
{
    public function run(): void
    {
        $types  = ['standard', 'confort', 'premium'];
        $statuses = ['enservice','enservice','enservice','maintenance','horsservice'];

        $rows = [];
        for ($i = 1; $i <= 20; $i++) {

            $plate = str_pad((string)(1000 + $i * 37), 5, '0', STR_PAD_LEFT) . '-A-6';

            $rows[] = [
                'plate_number' => $plate,
                'capacity'     => [44, 49, 52][array_rand([0,1,2])],
                'status'       => $statuses[array_rand($statuses)],
                'type'         => $types[array_rand($types)],
                'created_at'   => now(),
                'updated_at'   => now(),
            ];
        }

        DB::table('buses')->insert($rows);
    }
}
