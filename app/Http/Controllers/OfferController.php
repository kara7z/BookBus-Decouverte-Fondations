<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'from' => ['nullable','string'],
            'to'   => ['nullable','string','different:from'],
            'date' => ['nullable','date','after_or_equal:today','before_or_equal:' . now()->addDays(14)->toDateString()],
]);



        $offers = Offer::query()
            ->when($request->filled('from'), fn($q) => $q->where('from_city', $request->from))
            ->when($request->filled('to'), fn($q) => $q->where('to_city', $request->to))
            ->when($request->filled('date'), fn($q) => $q->whereDate('travel_date', $request->date))
            ->orderBy('travel_date')
            ->orderBy('departure_time')
            ->simplePaginate(8)
            ->withQueryString();

        $cities = Offer::query()
            ->select('from_city as city')
            ->union(Offer::query()->select('to_city as city'))
            ->distinct()
            ->orderBy('city')
            ->pluck('city');

        return view('offers', compact('offers','cities'));
    }
}
