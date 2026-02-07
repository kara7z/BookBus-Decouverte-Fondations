<x-layout title="Book Bus - My Bookings">

<div style="width:min(1000px,92%); margin: 20px auto;">
    <h2 style="font-size:2rem; font-weight:900; margin-bottom:14px;">My bookings</h2>

    @if ($errors->any())
        <div class="error-box">{{ $errors->first() }}</div>
    @endif

    @if (session('success'))
        <div class="success-box">{{ session('success') }}</div>
    @endif

    @forelse($bookings as $booking)
        <div class="offer-card">
            <div class="offer-top">
                <div class="route">
                    <span>{{ $booking->offer->from_city ?? '—' }}</span>
                    <span class="arrow">→</span>
                    <span>{{ $booking->offer->to_city ?? '—' }}</span>
                </div>

                <div class="price">
                    {{ $booking->offer->price ?? '—' }} MAD
                </div>
            </div>

            <div class="offer-mid">
                <span class="badge">{{ $booking->offer->company ?? 'Company' }}</span>
                <span class="muted">{{ $booking->offer->travel_date ?? '—' }}</span>
                <span class="muted">{{ $booking->offer->departure_time ?? '—' }}</span>
                <span class="muted">Seats: {{ $booking->seats_count }}</span>
                <span class="muted">{{ $booking->is_paid ? 'Paid' : 'Not paid' }}</span>
            </div>

            <div class="offer-actions">
                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="book-btn" type="submit">Cancel</button>
                </form>
            </div>
        </div>
    @empty
        <div class="empty-card">You have no bookings yet.</div>
    @endforelse

    <div class="pager">
        @if($bookings->previousPageUrl())
            <a class="p-btn" href="{{ $bookings->previousPageUrl() }}">← Prev</a>
        @endif

        @if($bookings->nextPageUrl())
            <a class="p-btn" href="{{ $bookings->nextPageUrl() }}">Next →</a>
        @endif
    </div>
</div>

<style>
.offer-card{
    background: rgba(255,255,255,.22);
    border:1px solid rgba(255,255,255,.35);
    border-radius: 18px;
    box-shadow: 0 18px 55px rgba(0,0,0,.12);
    padding: 16px;
    margin-bottom: 12px;
    backdrop-filter: blur(8px);
}
.offer-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:10px;
    flex-wrap:wrap;
}
.route{
    font-weight: 900;
    font-size: 1.15rem;
    color:#0d0d0d;
}
.arrow{ margin: 0 8px; }
.price{
    font-weight: 900;
    background: rgba(0,0,0,.92);
    color:#fff;
    padding: 8px 12px;
    border-radius: 14px;
}
.offer-mid{
    display:flex;
    gap:10px;
    flex-wrap:wrap;
    margin-top: 10px;
    align-items:center;
}
.badge{
    background: rgba(255,255,255,.65);
    border:1px solid rgba(0,0,0,.12);
    padding: 6px 10px;
    border-radius: 999px;
    font-weight: 900;
    color:#111;
}
.muted{
    color: rgba(0,0,0,.70);
    font-weight: 700;
}
.offer-actions{
    display:flex;
    justify-content:flex-end;
    margin-top: 12px;
}
.book-btn{
    padding: 10px 14px;
    border-radius: 14px;
    border:1px solid rgba(0,0,0,.25);
    background: rgba(0,0,0,.92);
    color: #fff;
    font-weight: 900;
    cursor:pointer;
}
.empty-card{
    background: rgba(255,255,255,.22);
    border:1px solid rgba(255,255,255,.35);
    border-radius: 18px;
    box-shadow: 0 18px 55px rgba(0,0,0,.12);
    padding: 18px;
    backdrop-filter: blur(8px);
    text-align:center;
    font-weight: 900;
    color: rgba(0,0,0,.75);
}
.pager{
    display:flex;
    justify-content:space-between;
    gap:10px;
    margin: 14px 0 30px;
}
.p-btn{
    padding: 10px 14px;
    border-radius: 14px;
    border:1px solid rgba(0,0,0,.18);
    background: rgba(255,255,255,.70);
    font-weight: 900;
    color:#111;
}
.error-box{
    margin: 12px 0;
    padding: 10px 12px;
    border-radius: 14px;
    border:1px solid rgba(0,0,0,.18);
    background: rgba(255,255,255,.65);
    font-weight: 900;
    color: rgba(140, 0, 0, .95);
}
.success-box{
    margin: 12px 0;
    padding: 10px 12px;
    border-radius: 14px;
    border:1px solid rgba(0,0,0,.18);
    background: rgba(0,0,0,.85);
    font-weight: 900;
    color: #fff;
}
</style>

</x-layout>
