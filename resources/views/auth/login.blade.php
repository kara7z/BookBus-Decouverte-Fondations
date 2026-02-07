<x-layout title="Book Bus - Login">

<form class="login-card" action="/login" method="POST">
	@csrf
	<span id="l-title">Login</span>
	<p class="l-sub">Welcome back — enter your account details.</p>

	<div class="l-group">
		<label class="l-label" for="email">Email</label>
		<input class="l-field" id="email" name="email" type="email" placeholder="example@mail.com" required>
	</div>

	<div class="l-group">
		<label class="l-label" for="password">Password</label>
		<input class="l-field" id="password" name="password" type="password" placeholder="••••••••" required>
	</div>
	<x-forms.error></x-forms.error>

	<div class="l-row">
		<label class="remember">
			<input type="checkbox" name="remember">
			<span>Remember me</span>
		</label>

		<a class="l-link" href="/forgot-password">Forgot password?</a>
	</div>

	<button class="l-btn" type="submit">Login</button>

	<p class="l-bottom">
		Don’t have an account?
		<a class="l-link" href="/register">Create one</a>
	</p>
</form>


<style>
	/* same vibe as your home "search-engine" card */
	.login-card{
		width:min(520px, 92%);
		margin: 26px auto 0;
		background: rgba(255,255,255,.22);
		border:1px solid rgba(255,255,255,.35);
		border-radius: 18px;
		box-shadow: 0 18px 55px rgba(0,0,0,.20);
		padding: 22px;
		backdrop-filter: blur(8px);
	}

	#l-title{
		display:block;
		font-size: 2rem;
		font-weight: 800;
		color: #0d0d0d;
		letter-spacing: .3px;
		text-align:center;
		margin-bottom: 6px;
	}

	.l-sub{
		text-align:center;
		color: rgba(0,0,0,.70);
		margin-bottom: 16px;
	}

	.l-group{
		margin-bottom: 12px;
	}

	.l-label{
		display:block;
		font-weight: 700;
		color: rgba(0,0,0,.75);
		margin-bottom: 6px;
		font-size: .95rem;
	}

	.l-field{
		width:100%;
		padding: 12px 12px;
		border-radius: 14px;
		border:1px solid rgba(0,0,0,.18);
		background: rgba(255,255,255,.85);
		box-shadow: 0 10px 25px rgba(0,0,0,.10);
		font-size: 1rem;
		outline:none;
		transition: .15s ease;
	}

	.l-field::placeholder{
		color: rgba(0,0,0,.45);
	}

	.l-field:focus{
		border-color: rgba(0,0,0,.55);
		box-shadow: 0 0 0 4px rgba(0,0,0,.18);
	}

	.l-row{
		display:flex;
		align-items:center;
		justify-content:space-between;
		gap:10px;
		margin: 8px 0 14px;
		flex-wrap:wrap;
	}

	.remember{
		display:flex;
		align-items:center;
		gap:8px;
		color: rgba(0,0,0,.75);
		font-weight: 700;
		user-select:none;
	}

	.remember input{
		width:16px;
		height:16px;
		accent-color: #111;
	}

	.l-link{
		color: rgba(0,0,0,.85);
		font-weight: 800;
		text-decoration: underline;
		text-underline-offset: 3px;
	}

	.l-link:hover{
		opacity:.85;
	}

	.l-btn{
		width:100%;
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
		margin-top: 6px;
	}

	.l-btn:hover{
		transform: translateY(-1px);
		background: rgba(0,0,0,1);
	}

	.l-btn:focus{
		outline:none;
		box-shadow: 0 0 0 4px rgba(0,0,0,.22);
	}

	.l-bottom{
		text-align:center;
		margin-top: 14px;
		color: rgba(0,0,0,.70);
		font-weight: 700;
	}

	@media (max-width: 520px){
		#l-title{ font-size: 1.6rem; }
		.l-row{ justify-content:center; }
	}
</style>

</x-layout>

