<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Offer;
use Carbon\Carbon;

class OfferSeeder extends Seeder
{
    public function run(): void
    {
        $cities = ['Rabat', 'Casablanca', 'Safi', 'Agadir', 'Fes', 'Marrakech'];

        $startDate = Carbon::today();
        $daysAhead = 60;
        $offersPerRoutePerDay = 3;

        for ($d = 0; $d < $daysAhead; $d++) {
            $date = $startDate->copy()->addDays($d);

            foreach ($cities as $from) {
                foreach ($cities as $to) {
                    if ($from === $to) {
                        continue;
                    }

                    $times = $this->pickThreeTimes();
                    $types = ['Standard', 'Comfort', 'VIP'];

                    for ($i = 0; $i < $offersPerRoutePerDay; $i++) {
                        $time = $times[$i];
                        $type = $types[$i];

                        $base = $this->basePrice($from, $to);
                        $price = $this->variantPrice($base, $type);

                        Offer::create([
                            'from_city'      => $from,
                            'to_city'        => $to,
                            'travel_date'    => $date->toDateString(),
                            'departure_time' => $time,
                            'company'        => 'CTM',
                            'bus_type'       => $type,
                            'price'          => $price,
                        ]);
                    }
                }
            }
        }
    }

    private function pickThreeTimes(): array
    {
        $pool = ['06:30', '08:30', '10:30', '12:30', '14:30', '16:30', '18:30', '20:30'];

        $a = $pool[array_rand($pool)];
        do {
            $b = $pool[array_rand($pool)];
        } while ($b === $a);

        do {
            $c = $pool[array_rand($pool)];
        } while ($c === $a || $c === $b);

        return [$a, $b, $c];
    }

    private function basePrice(string $from, string $to): int
    {
        $key = $this->pairKey($from, $to);

        $baseMap = [
            'Casablanca|Rabat'   => 25,
            'Rabat|Safi'         => 90,
            'Agadir|Rabat'       => 150,
            'Agadir|Casablanca'  => 130,
            'Fes|Marrakech'      => 150,
            'Marrakech|Safi'     => 60,
        ];

        if (isset($baseMap[$key])) {
            return $baseMap[$key];
        }

        $km = $this->distanceKm($from, $to);
        $rate = 0.28;
        $price = (int) round($km * $rate);
        $price = max($price, 25);

        return $this->roundTo5($price);
    }

    private function variantPrice(int $base, string $busType): int
    {
        $mul = match ($busType) {
            'Standard' => 1.00,
            'Comfort'  => 1.10,
            'VIP'      => 1.20,
            default    => 1.00,
        };

        return $this->roundTo5((int) round($base * $mul));
    }

    private function roundTo5(int $x): int
    {
        return (int) (round($x / 5) * 5);
    }

    private function pairKey(string $a, string $b): string
    {
        return (strcmp($a, $b) < 0) ? "{$a}|{$b}" : "{$b}|{$a}";
    }

    private function distanceKm(string $a, string $b): int
    {
        $key = $this->pairKey($a, $b);

        $map = [
            'Casablanca|Rabat'     => 80,
            'Rabat|Safi'           => 260,
            'Agadir|Rabat'         => 610,
            'Agadir|Casablanca'    => 470,
            'Fes|Marrakech'        => 530,
            'Casablanca|Marrakech' => 220,
            'Casablanca|Fes'       => 290,
            'Safi|Casablanca'      => 240,
            'Safi|Marrakech'       => 160,
        ];

        return $map[$key] ?? 300;
    }
}
