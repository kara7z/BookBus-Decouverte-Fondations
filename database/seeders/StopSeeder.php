<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StopSeeder extends Seeder
{
    public function run(): void
    {
        $routeId = fn(string $code) => DB::table('routes')->where('code', $code)->value('id');
        $gareId  = fn(string $name) => DB::table('gares')->where('name', $name)->value('id');

        $routesStops = [
            'L101' => ['Casa Voyageurs', 'Settat Gare', 'Marrakech Gare'],
            'L102' => ['Casa Voyageurs', 'Rabat Ville'],
            'L103' => ['Rabat Ville', 'Casa Voyageurs'],
            'L104' => ['Rabat Ville', 'Settat Gare', 'Marrakech Gare'],
            'L105' => ['Casa Voyageurs', 'Marrakech Gare', 'Agadir Gare'],
            'L106' => ['Agadir Gare', 'Marrakech Gare'],
            'L107' => ['Settat Gare', 'Casa Voyageurs'],
            'L108' => ['Settat Gare', 'Marrakech Gare'],
            'L109' => ['Casa Voyageurs', 'Marrakech Gare'],
            'L110' => ['Rabat Ville', 'Marrakech Gare', 'Agadir Gare'],
        ];

        $rows = [];
        foreach ($routesStops as $code => $stops) {
            $rid = $routeId($code);
            $order = 1;

            foreach ($stops as $gareName) {
                $rows[] = [
                    'route_id'   => $rid,
                    'gare_id'    => $gareId($gareName),
                    'stop_order' => $order,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                $order++;
            }
        }

        DB::table('stops')->insert($rows);
    }
}
