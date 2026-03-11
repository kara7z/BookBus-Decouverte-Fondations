<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SegmentSeeder extends Seeder
{
    public function run(): void
    {
        $routes = DB::table('routes')->select('id')->get();

        $rows = [];

        foreach ($routes as $route) {
            $stops = DB::table('stops')
                ->where('route_id', $route->id)
                ->orderBy('stop_order')
                ->get()
                ->values();

            for ($i = 0; $i < $stops->count(); $i++) {
                for ($j = $i + 1; $j < $stops->count(); $j++) {
                    $rows[] = [
                        'route_id' => $route->id,
                        'from_stop_id' => $stops[$i]->id,
                        'to_stop_id' => $stops[$j]->id,
                        'distance' => null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }

        if (!empty($rows)) {
            DB::table('segments')->insert($rows);
        }
    }
}
