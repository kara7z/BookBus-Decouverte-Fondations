<x-layout title="Book Bus - Home">
<form class="search-engine" action="/offers" method="GET">
	<span id="s-title">Search Engine</span>

	<div class="s-inputs">
		<select name="from" id="from" required>
		    <option value="" disabled {{ request('from') ? '' : 'selected' }}>Start City</option>
		    @foreach($cities as $city)
		        <option value="{{ $city }}" {{ request('from') == $city ? 'selected' : '' }}>
		            {{ $city }}
		        </option>
		    @endforeach
		</select>

		<select name="to" id="to" required>
		    <option value="" disabled {{ request('to') ? '' : 'selected' }}>End City</option>
		    @foreach($cities as $city)
		        <option value="{{ $city }}" {{ request('to') == $city ? 'selected' : '' }}>
		            {{ $city }}
		        </option>
		    @endforeach
		</select>

  		<input
  		type="date"	name="date" value="{{ request('date') }}"
		min="{{ now()->toDateString() }}"
  		max="{{ now()->addDays(14)->toDateString() }}" 
  		required>
	</div>

	<button class="s-btn" type="submit">Search</button>
</form>

<style>
	.search-engine{
		width:min(900px, 92%);
		margin: 26px auto 0;
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

	.s-inputs option{ font-size: 1rem; }

	.s-inputs select:focus,
	.s-inputs input[type="date"]:focus{
		border-color: rgba(0,0,0,.55);
		box-shadow: 0 0 0 4px rgba(0,0,0,.18);
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

	.s-btn:focus{
		outline:none;
		box-shadow: 0 0 0 4px rgba(0,0,0,.22);
	}

	@media (max-width: 520px){
		#s-title{ font-size: 1.6rem; }
		.s-inputs select,
		.s-inputs input[type="date"]{ min-width: 100%; }
		.s-btn{ width: 100%; }
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
