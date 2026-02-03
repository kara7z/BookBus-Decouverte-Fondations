@props(['title'=>'Default Title','pageName'=>'Default Page'])
@props(['kae'=>'haiiiiiiiiiiiii'])
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $title }}</title>
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
	<style>
		.card{
			color:white; 
			background-color:black;
			padding:.4rem;
		}
		
	</style>
</head>
<body>
	<h1>{{ $pageName }}</h1>
	<h3>{{ $kae }}</h3>
	<ul>
		<li><a href="/home">home tab</a></li> 
	   	<li><a href="/search">Search tab</a></li> 
	   	<li><a href="/form">form tab</a></li> 
	   	<li><a href="/">welcome tab</a></li>
   </ul>

	{{ $slot }}
</body>
</html>