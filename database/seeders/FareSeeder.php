<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FareSeeder extends Seeder
{
    public function run(): void
    {
        $routeId = fn(string $code) => DB::table('routes')->where('code', $code)->value('id');

        $l101Id = $routeId('L101');

        $stopIdByGareName = function (int $routeId, string $gareName) {
            return DB::table('stops')
                ->join('gares', 'gares.id', '=', 'stops.gare_id')
                ->where('stops.route_id', $routeId)
                ->where('gares.name', $gareName)
                ->value('stops.id');
        };

        $l101Casa    = $stopIdByGareName($l101Id, 'Casa Voyageurs');
        $l101Settat  = $stopIdByGareName($l101Id, 'Settat Gare');
        $l101Marr    = $stopIdByGareName($l101Id, 'Marrakech Gare');


        $fixedPrices = [

            "{$l101Casa}-{$l101Settat}" => 50,

            "{$l101Settat}-{$l101Marr}" => 70,

            "{$l101Casa}-{$l101Marr}"   => 120,
        ];

        $segments = DB::table('segments')->select('id','route_id','from_stop_id','to_stop_id')->get();

        $rows = [];
        foreach ($segments as $seg) {
            $key = "{$seg->from_stop_id}-{$seg->to_stop_id}";

            if ((int)$seg->route_id === (int)$l101Id && isset($fixedPrices[$key])) {
                $price = $fixedPrices[$key];
            } else {
                // realistic MAD values for other routes
                $choices = [40, 50, 60, 70, 80, 90, 100, 120, 140, 160];
                $price = $choices[array_rand($choices)];
            }

            $rows[] = [
                'segment_id' => $seg->id,
                'price'      => $price,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('fares')->insert($rows);
    }
}
