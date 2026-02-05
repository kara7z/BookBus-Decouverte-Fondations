<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'Ahmed El Fassi', 'Youssef Amrani', 'Omar Benali', 'Hamza Alami', 'Khalid Ait Ali',
            'Said Boukhari', 'Rachid El Idrissi', 'Mehdi Ziani', 'Anas Chafik', 'Tarik Lahlou',
            'Hicham Saadi', 'Adil El Kadi', 'Nabil Driouch', 'Reda Benslimane', 'Ayoub El Mernissi',
        ];

        $rows = [];
        foreach ($names as $idx => $name) {
            $rows[] = [
                'name'           => $name,
                'role'           => 'driver',
                'license_number' => 'PERMIS-' . str_pad((string)($idx + 1), 3, '0', STR_PAD_LEFT),
                'created_at'     => now(),
                'updated_at'     => now(),
            ];
        }

        DB::table('employees')->insert($rows);
    }
}
