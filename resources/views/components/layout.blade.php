@props(['title'=>'Book Bus'])
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $title }}</title>
<style>
	:root{
		--bg:#9b9b9b;
		--panel:#111;
		--panel2:#1a1a1a;
		--text:#111;
		--text-inv:#fff;
		--muted:rgba(255,255,255,.75);
		--border:rgba(255,255,255,.20);
		--shadow:0 16px 45px rgba(0,0,0,.25);
		--radius:14px;
	}
	*{
		padding:0;
		margin:0;
		text-decoration:none;
		color:inherit;
		box-sizing:border-box;
	}
	body{
		background:
			linear-gradient(180deg, rgba(0,0,0,.12), rgba(0,0,0,.20)),
			var(--bg);
		color:var(--text);
		font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial;
		min-height:100vh;
	}
	footer{
		position:sticky;
		top:0;
		z-index:20;
		box-shadow: 0 10px 30px rgba(0,0,0,.18);
	}
	#title{
		display:flex;
		justify-content:center;
		align-items:center;
		text-align:center;
		color:var(--text-inv);
		font-weight:800;
		background: linear-gradient(90deg, #000, #1a1a1a);
		font-size:2rem;
		border-bottom:1px solid var(--border);
		padding:14px 10px;
		letter-spacing:1px;
	}
	.navbar{
		display:flex;
		gap:12px;
		background: rgba(0,0,0,.92);
		padding:10px 8px;
		border-bottom:1px solid rgba(255,255,255,.12);
	}
	.navbar button{
		cursor: pointer;
		background:none;
	}
	.navbar a,.navbar button{
		color:var(--text-inv);
		font-size:1.1rem;
		padding:10px 14px;
		border-radius:12px;
		transition: .18s ease;
		border:1px solid transparent;
	}
	.navbar a:hover ,.navbar button:hover{
		font-weight:700;
		background: rgba(255,255,255,.10);
		border-color: rgba(255,255,255,.18);
		transform: translateY(-1px);
	}
	.navbar .login-btn{
		margin-left:auto;
	}
	.navbar a:focus ,.navbar button:focus{
		outline:none;
		box-shadow: 0 0 0 4px rgba(255,255,255,.18);
	}
	main{
		padding:22px 0 40px;
	}
	main > *{
		width:min(1100px, 92%);
		margin:0 auto;
	}
	@media (max-width: 520px){
		#title{ font-size:1.6rem; }
		.navbar{
			flex-wrap:wrap;
			gap:8px;
		}
		.navbar a ,.navbar button{ width:100%; text-align:center; }
	}
</style>

</head>
<body>
	<footer>
	<span id="title">BOOK-BUS</span>
	<nav class="navbar">
		<a href="/">Home</a>
		<a href="/offers">Offers</a>

		@auth
			<a href="{{ route('bookings.index') }}">My bookings</a>
		@endauth

		@guest
			<a href="/login" class="login-btn">Login</a>
		@endguest

		@auth
			<form action="{{ url('logout') }}" method="POST" style=" margin-left:auto;">
				@csrf
				@method('DELETE')
				<button type="submit" class="login-btn">log-out</button>
			</form>
		@endauth
	</nav>
	</footer>

	<main>
		{{ $slot }}
	</main>
</body>
</html>
