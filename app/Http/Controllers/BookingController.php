<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Offer;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $bookings = $request->user()
            ->bookings()
            ->with('offer')
            ->latest()
            ->paginate(10);

        return view('bookings.index', compact('bookings'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'offer_id'    => ['required', 'integer', 'exists:offers,id'],
            'seats_count' => ['nullable', 'integer', 'min:1', 'max:10'],
        ]);

        $offer = Offer::findOrFail($data['offer_id']);

        $exists = Bookings::where('user_id', $request->user()->id)
            ->where('offer_id', $offer->id)
            ->exists();

        if ($exists) {
            return back()->withErrors(['booking' => 'You already booked this offer.']);
        }

        Bookings::create([
            'user_id'     => $request->user()->id,
            'offer_id'    => $offer->id,
            'seats_count' => $data['seats_count'] ?? 1,
            'is_paid'     => false,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booked');
    }

    public function destroy(Request $request, Bookings $booking)
    {
        abort_if($booking->user_id !== $request->user()->id, 403);

        $booking->delete();

        return back()->with('success', 'Booking canceled');
    }
}
