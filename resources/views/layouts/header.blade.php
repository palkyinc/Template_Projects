<!DOCTYPE html>
<html lang="es">
	
<head>
	<meta charset="UTF-8">
	<title>Palky Demo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/css/estilos.css">
	<!-- Bootstrap library -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	
</head>
<body class="{{$bg_data['bg_body']}}">
	<script src="/js/Vendor/sweetalert2@10.js"></script>
	<script src="/js/Vendor/jquery-3.5.1.slim.min.js"></script>
	<script src="/jsboot/jquery.easy-autocomplete.min.js"></script>
    <!-- Bootstrap library
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
	 -->
	<header>

		<nav class="navbar navbar-expand-md navbar-{{$bg_data['bg_footerHeader']}} bg-{{$bg_data['bg_footerHeader']}} fixed-top">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link {{  $principal ?? ''}}" href="/dashboard">Principal</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle {{ $sistema ?? ''}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Sistema
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#">Usuarios</a></li>
							<li><a class="dropdown-item" href="#">Roles</a></li>
							<li><a class="dropdown-item" href="#">Permisos</a></li>
						</ul>
					</li>
				</ul>
			</div>
		    <div class="collapse navbar-collapse">
		  		<a class="navbar-brand" href="">
				    <img src="/icons/5991785_coronavirus_countries_infected_map_spread_icon.svg" width="30" height="30" class="d-inline-block align-top" alt="logotipo" loading="lazy">
				    Brand Name
				</a>
			</div>
				@guest
					<div class="collapse navbar-collapse">
						<ul class="navbar-nav mr-auto">
							@if (Route::has('login'))
							<li class="navbar-nav mr-auto"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
							@endif
							
							@if (Route::has('register'))
							<li class="navbar-nav mr-auto"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
							@endif
						</ul>
					</div>
				@else
					<div class="nav-item dropdown">
						<ul class='navbar-nav mr-auto'>
							<li class="nav-item">
								<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->name }}
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									<li>
										<a class="dropdown-item" href="{{ route('logout') }}"
											onclick="event.preventDefault();
															document.getElementById('logout-form').submit();">
											{{ __('Logout') }}
										</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
									</li>
									<li><a class="dropdown-item" href="userChangeViewMode">Día / Noche</a></li>
								</ul>
							</li>
						</ul>
					</div>
				@endguest
		</nav>
	</header>