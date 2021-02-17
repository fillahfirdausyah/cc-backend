<!DOCTYPE html>
<html>
<head>
	<title>Lebih Banyak</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{asset('css/showroom.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/visitSR.css')}}">
</head>
<body>

<header>
	<!-- Navigation Bar -->
	<nav class="fixed-top" id="navigation">
		<button id="icon" class="btn icon_btn" type="button"><img src="{{ asset('bootstrap-icons/list.svg') }}" width="20" height="20"></button>
		<div class="row justify-content-start" id="myTopnav">
			<div class="col-6 d-flex justify-content-start">
				<div><a href="/showroom"><h3>Car Community</h3></a></div>
			</div>
			<div class="col-5 d-flex justify-content-center">
				<a href="/showroom/more/sr"><button type="button" class="btn btn-sm direction"> Toko </button></a>
				<a href="/showroom/more/bengkel"><button type="button" class="btn btn-sm direction"> Bengkel </button></a>			
			</div>
		</div>
	</nav>	
</header>

<main style="margin-top: 150px;">
	<div class="row justify-content-center cc">
		<h2 class="font-weight-normal text-center" style="color:#434175;">Toko</h2>
	</div>
	<div class="row justify-content-center">
		<form method="post" action="/showroom/more/sr/search" class="form-inline my-2 my-lg-0">
			@csrf
			<div class="input-group">
			  <input type="search" name="search" class="form-control rounded" placeholder="Cari" aria-label="Search"
			    aria-describedby="search-addon" />
			  <input type="submit" name="" class="btn btn-outline-primary" value="Cari">
			</div>
	    </form>
	</div>
	<hr>
	<div class="row mx-auto my-auto">
		@foreach($SR as $item => $key)
			<div class="col-md-3 col-2 card-group">
				<div class="card" style="padding: 5px; margin-top:10px;">
					<img class="card-img-top" src="{{ url('/public/image/'.$collectSR[$item]) }}" width="310" height="200" alt="">
					<div class="card-body">
						<h4 class="card-title"><a href="{{'/showroom/'.$key->id.'-'.$key->slug }}">{{ $key->judul }}</a></h4>
						@if($key->promo == NULL)
							<p class="card-text" id="harga">Harga <strong>Rp.{{ $key->harga }}</strong></p>
						@elseif($key->promo != NULL)
							<p class="card-text" id="harga">Harga <strong>Rp.{{ $key->harga }}</strong></del></p>
							<p class="card-text"><strong>Promo</strong> {{ $key->promo }}%</p>
						@endif
						<p class="card-text"><small class="text-muted">Updated on {{ $key->created_at }}</small></p>
					</div>
				</div>
			</div>	
		@endforeach	
    </div>
    {{ $SR->links() }}
</main>


<footer>
	<div class="container text-center">
		<h4>@COPYRIGHT CAR COMMUNITY</h4>
	</div>
</footer>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{ asset('js/showroom.js')}}" type="text/javascript"></script>
</body>
</html>