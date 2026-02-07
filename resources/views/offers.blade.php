<x-layout title="Book Bus - Offers">

<form class="search-engine" action="/offers" method="GET">
    <span id="s-title">Offers</span>

    <div class="s-inputs">
        <select name="from" id="from">
            <option value="" disabled {{ request('from') ? '' : 'selected' }}>Start City</option>
            @foreach($cities as $city)
                <option value="{{ $city }}" {{ request('from') == $city ? 'selected' : '' }}>
                    {{ $city }}
                </option>
            @endforeach
        </select>

        <select name="to" id="to">
            <option value="" disabled {{ request('to') ? '' : 'selected' }}>End City</option>
            @foreach($cities as $city)
                <option value="{{ $city }}" {{ request('to') == $city ? 'selected' : '' }}>
                    {{ $city }}
                </option>
            @endforeach
        </select>

        <input
            type="date" name="date" value="{{ request('date') }}"
            min="{{ now()->toDateString() }}"
            max="{{ now()->addDays(14)->toDateString() }}"
            required
        >
    </div>

    <div class="actions-row">
        <button class="s-btn" type="submit">Search</button>
        <a class="clear-btn" href="/offers">Clear</a>
    </div>

    @if ($errors->any())
        <div class="error-box">{{ $errors->first() }}</div>
    @endif

    @if (session('success'))
        <div class="success-box">{{ session('success') }}</div>
    @endif
</form>


<div class="offers-wrap">
    @forelse($offers as $offer)
        <div class="offer-card">
            <div class="offer-top">
                <div class="route">
                    <span>{{ $offer->from_city }}</span>
                    <span class="arrow">→</span>
                    <span>{{ $offer->to_city }}</span>
                </div>

                <div class="price">{{ $offer->price }} MAD</div>
            </div>

            <div class="offer-mid">
                <span class="badge">{{ $offer->company ?? 'Company' }}</span>
                <span class="muted">{{ $offer->travel_date ?? '—' }}</span>
                <span class="muted">{{ $offer->departure_time ?? '—' }}</span>
                <span class="muted">{{ $offer->bus_type ?? '—' }}</span>
            </div>

            @guest
                <div class="offer-actions">
                    <a class="book-btn" href="/login">Please login to book</a>
                </div>
            @endguest

            @auth
                <div class="offer-actions">
                    <form class="book-form" action="{{ route('bookings.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="offer_id" value="{{ $offer->id }}">
                        <button class="book-btn" type="submit">Book</button>
                    </form>
                </div>
            @endauth
        </div>
    @empty
        <div class="empty-card">No offers found.</div>
    @endforelse


    <div class="pager">
        @if($offers->previousPageUrl())
            <a class="p-btn" href="{{ $offers->previousPageUrl() }}">← Prev</a>
        @endif

        @if($offers->nextPageUrl())
            <a class="p-btn" href="{{ $offers->nextPageUrl() }}">Next →</a>
        @endif
    </div>
</div>


<style>
    .search-engine{
        width:min(1000px, 92%);
        margin: 26px auto 14px;
        background: rgba(255,255,255,.22);
        border:1px solid rgba(255,255,255,.35);
        border-radius: 18px;
        box-shadow: 0 18px 55px rgba(0,0,0,.20);
        padding: 18px;
        backdrop-filter: blur(8px);
        text-align:center;
    }
    #s-title{
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 14px;
        color: #0d0d0d;
        letter-spacing: .3px;
        display:block;
    }
    .s-inputs{
        display:flex;
        justify-content:center;
        align-items:center;
        gap:12px;
        flex-wrap:wrap;
        margin-bottom: 14px;
    }

    .s-inputs select,
    .s-inputs input[type="date"]{
        min-width: 200px;
        padding: 12px 12px;
        border-radius: 14px;
        border:1px solid rgba(0,0,0,.18);
        background: rgba(255,255,255,.80);
        box-shadow: 0 10px 25px rgba(0,0,0,.10);
        font-size: 1rem;
        outline:none;
        transition: .15s ease;
    }
    .s-inputs select:focus,
    .s-inputs input[type="date"]:focus{
        border-color: rgba(0,0,0,.55);
        box-shadow: 0 0 0 4px rgba(0,0,0,.18);
    }
    .actions-row{
        display:flex;
        justify-content:center;
        gap:10px;
        flex-wrap:wrap;
    }
    .s-btn{
        padding: 12px 20px;
        border-radius: 14px;
        border:1px solid rgba(0,0,0,.25);
        background: rgba(0,0,0,.92);
        color: white;
        font-size: 1.05rem;
        font-weight: 800;
        cursor:pointer;
        box-shadow: 0 12px 25px rgba(0,0,0,.18);
        transition: .18s ease;
    }
    .s-btn:hover{
        transform: translateY(-1px);
        background: rgba(0,0,0,1);
    }
    .clear-btn{
        padding: 12px 16px;
        border-radius: 14px;
        border:1px solid rgba(0,0,0,.18);
        background: rgba(255,255,255,.70);
        font-weight: 900;
        color:#111;
    }
    .clear-btn:hover{
        background: rgba(255,255,255,.88);
    }
    .error-box{
        margin-top: 12px;
        padding: 10px 12px;
        border-radius: 14px;
        border:1px solid rgba(0,0,0,.18);
        background: rgba(255,255,255,.65);
        font-weight: 900;
        color: rgba(140, 0, 0, .95);
    }
    .success-box{
        margin-top: 12px;
        padding: 10px 12px;
        border-radius: 14px;
        border:1px solid rgba(0,0,0,.18);
        background: rgba(0,0,0,.85);
        font-weight: 900;
        color: #fff;
    }

    .offers-wrap{
        width:min(1000px, 92%);
        margin: 0 auto;
    }
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

    .book-form{ display:inline-block; }

    .book-btn{
        padding: 10px 14px;
        border-radius: 14px;
        border:1px solid rgba(0,0,0,.25);
        background: rgba(0,0,0,.92);
        color: #fff;
        font-weight: 900;
        cursor:pointer;
    }
    .book-btn:hover{ transform: translateY(-1px); }

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

    .p-btn:hover{
        background: rgba(255,255,255,.88);
    }

    @media (max-width: 520px){
        #s-title{ font-size: 1.6rem; }
        .s-inputs select,
        .s-inputs input[type="date"]{ min-width: 100%; }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const from = document.getElementById('from');
  const to   = document.getElementById('to');

  function syncToOptions() {
    const selectedFrom = from.value;

    Array.from(to.options).forEach(opt => {
      if (!opt.value) return;
      const same = opt.value === selectedFrom;
      opt.disabled = same;
      opt.hidden   = same;
    });

    if (to.value === selectedFrom) {
      to.value = '';
    }
  }

  from.addEventListener('change', syncToOptions);
  syncToOptions();
});
</script>

</x-layout>
