<x-layout title="Book Bus - Register">

<form class="register-card" action="/register" method="POST">
	@csrf

	<span id="r-title">Create Account</span>
	<p class="r-sub">Join Book Bus — it takes only a minute.</p>

	<div class="r-group">
		<label class="r-label" for="name">Full Name</label>
		<input class="r-field" id="name" name="name" type="text" placeholder="Your name" required>
	</div>

	<div class="r-group">
		<label class="r-label" for="email">Email</label>
		<input class="r-field" id="email" name="email" type="email" placeholder="example@mail.com" required>
	</div>

	<div class="r-group">
		<label class="r-label" for="password">Password</label>
		<input class="r-field" id="password" name="password" type="password" placeholder="Create a password" required>
	</div>

	<div class="r-group">
		<label class="r-label" for="password_confirmation">Confirm Password</label>
		<input class="r-field" id="password_confirmation" name="password_confirmation" type="password" placeholder="Repeat password" required>
	</div>

	<label class="terms">
		<input type="checkbox" name="terms" required>
		<span>I agree to the <a class="r-link" href="/terms">terms</a> and <a class="r-link" href="/privacy">privacy policy</a>.</span>
	</label>

	<button class="r-btn" type="submit">Register</button>

	<p class="r-bottom">
		Already have an account?
		<a class="r-link" href="/login">Login</a>
	</p>
</form>


<style>
	.register-card{
		width:min(560px, 92%);
		margin: 26px auto 0;
		background: rgba(255,255,255,.22);
		border:1px solid rgba(255,255,255,.35);
		border-radius: 18px;
		box-shadow: 0 18px 55px rgba(0,0,0,.20);
		padding: 22px;
		backdrop-filter: blur(8px);
	}

	#r-title{
		display:block;
		font-size: 2rem;
		font-weight: 800;
		color: #0d0d0d;
		letter-spacing: .3px;
		text-align:center;
		margin-bottom: 6px;
	}

	.r-sub{
		text-align:center;
		color: rgba(0,0,0,.70);
		margin-bottom: 16px;
	}

	.r-group{
		margin-bottom: 12px;
	}

	.r-label{
		display:block;
		font-weight: 700;
		color: rgba(0,0,0,.75);
		margin-bottom: 6px;
		font-size: .95rem;
	}

	.r-field{
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

	.r-field::placeholder{
		color: rgba(0,0,0,.45);
	}

	.r-field:focus{
		border-color: rgba(0,0,0,.55);
		box-shadow: 0 0 0 4px rgba(0,0,0,.18);
	}

	.terms{
		display:flex;
		align-items:flex-start;
		gap:10px;
		margin: 10px 0 14px;
		color: rgba(0,0,0,.72);
		font-weight: 700;
		line-height:1.35;
		user-select:none;
	}

	.terms input{
		width:16px;
		height:16px;
		margin-top: 3px;
		accent-color: #111;
	}

	.r-link{
		color: rgba(0,0,0,.85);
		font-weight: 800;
		text-decoration: underline;
		text-underline-offset: 3px;
	}

	.r-link:hover{
		opacity:.85;
	}

	/* same button style as login/search */
	.r-btn{
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

	.r-btn:hover{
		transform: translateY(-1px);
		background: rgba(0,0,0,1);
	}

	.r-btn:focus{
		outline:none;
		box-shadow: 0 0 0 4px rgba(0,0,0,.22);
	}

	.r-bottom{
		text-align:center;
		margin-top: 14px;
		color: rgba(0,0,0,.70);
		font-weight: 700;
	}

	@media (max-width: 520px){
		#r-title{ font-size: 1.6rem; }
	}
</style>

</x-layout>
