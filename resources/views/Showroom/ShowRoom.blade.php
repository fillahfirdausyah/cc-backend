<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{asset('css/showroom.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/visitSR.css')}}">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>Showroom</title>
</head>
<body>

<header>
	<!-- Navigation Bar -->
	<nav class="fixed-top" id="navigation">
		<button id="icon" class="btn icon_btn" type="button"><img src="{{ asset('bootstrap-icons/list.svg') }}" width="20" height="20"></button>
		<div class="row justify-content-start" id="myTopnav">
			<div class="col-3 d-flex justify-content-start">
				<div><h3>Car Community</h3></div>
			</div>
			<div class="col-5 d-flex justify-content-center">
				<button type="button" class="btn btn-sm direction" onclick="direction('news')"> Promo </button>
				<button type="button" class="btn btn-sm direction" onclick="direction('promo')"> Bengkel </button>
				<button type="button" class="btn btn-sm direction" onclick="direction('commerce')"> Toko </button>
				<div class="dropdown">
				  	<button class="dropbtn btn-sm directon">Navigasi</button>
				  	<div class="dropdown-content">
				    	<a href="/member/home">Social Network</a>
				    	<a href="http://cc.buanalintas.co.id/">Website</a>
				  	</div>
				</div>
			</div>
			<div class="col-3 mt-3 d-flex justify-content-end">
				<form class="form-inline my-2 my-lg-0">
					@csrf
					<div class="container">
						<input class="form-control text-center" id="search" type="text" placeholder="Cari Barang">
						<div id="result"></div>
						<br>
					</div>
			    </form>
			</div>
		</div>
	</nav>	
</header>

<main class="container">
<!-- News -->
	<div class="container-fluid" id="news" style="background-color: #FAFAFA;">
		<div class="">
			<div class="mySlide sliding">
				<img width="100%" src="{{ asset('image/IMG_20190830_165507.jpg') }}" height="350" style="margin-top: 100px;  margin-bottom: 5px;">
			</div>
			<div style="text-align:center">
			  	<span class="dot" onclick="currentSlide(1)"></span> 
			  	<span class="dot" onclick="currentSlide(2)"></span> 
			  	<span class="dot" onclick="currentSlide(3)"></span> 
			</div>
		</div>
	</div>

<hr>

<div class="container-fluid text-center my-3">
   	<!-- Start Bengkel -->
   	<div class="row justify-content-center mb-2" id="promo">
   		<div class="col-4 justify-content-center">
   			<h2 class="font-weight-normal" style="color:#434175;">Bengkel</h2>
			<a href="/showroom/upload/bengkel"><button class="btn btn-primary" type="button">Promosiin Bengkelmu Gan!</button></a>
   		</div>
   	</div>
   	<div>
        @if($bengkel->count() > 0)
	    <div class="row mx-auto my-auto">
    		@foreach($bengkel as $item => $key)
				<div class="col-md-3 card-group">
					<div class="card" style="padding: 5px; margin-top:10px;">
						<img class="card-img-top" src="{{ url('/public/image/'.$collectB[$item]) }}" width="250" height="180" alt="">
						<div class="card-body">
							<h4 class="card-title"><a href="{{'/showroom/bengkel/show/'.$key->id.'-'.$key->slug }}">{{ $key->nama}}</a></h4>
							<p class="card-text">Daerah {{ $key->daerah->region }}</p>
							<p class="card-text"><small class="text-muted">Updated on {{ $key->created_at }}</small></p>
						</div>
					</div>
				</div>	
			@endforeach
	    </div>
    	<div class="row justify-content-center mt-3">
    		<a href="/showroom/more/bengkel" class="text-center"><strong><h4>Lebih Banyak...</h4></strong></a>
    	</div>
		@endif
	    <br>
	    <!-- End Bengkel -->
	    <hr>

	    <div id="CC">
    	@if (session('status'))
		    <div class="alert alert-success">
		        {{ session('status') }}
		    </div>
		@endif
	    <div class="row justify-content-center cc" id="commerce">
	    	<div class="col-2 justify-content-end cart_icon">
	    		<img src="{{ asset('bootstrap-icons/cart_shop2.png')}}" width="100" height="100">
	    	</div>
	    	<div class="col-4 justify-content-start cc">
	    		<h2 class="font-weight-normal" style="color:#434175;">Toko</h2>
	    			<a href="/showroom/upload"><button class="btn btn-primary" type="button">Mau jualan juga gan? Klik sini</button></a>
	    	</div>
	    	<div class="col-2 justify-content-start cart_icon">
	    		<img src="{{ asset('bootstrap-icons/cart_shop.png')}}" width="100" height="100">
	    	</div>
	    </div>
	    </div>
	</div>
</div>
	<div class="row">	
		<!-- Content -->
		<div class="col-lg-10 content2">
			<section class="content">
				@if($SR->count() >= 0)
				<div class="row">
					@foreach($SR as $item => $key)
					<div class="col-md-4 card-group">
						<div class="card" style="padding: 5px; margin-top:10px;">
							<img class="card-img-top" src="{{ url('/public/image/'.$collectSR[$item]) }}" width="250" height="180" alt="">
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
		    	<div class="row justify-content-center mt-3">
		    		<a href="/showroom/more/sr" class="text-center"><strong><h4>Lebih Banyak...</h4></strong></a>
		    	</div>
				@endif
			</section>		
		</div>
		<!-- End Content -->

		<!-- Start Kategori -->
		<div class="col-lg-2 text-center" id="category">
			<h3 style="color:#434175; display: block;">KATEGORI</h3>
			<ul class="list-group list-group-flush">
				<button class="btn category" onclick="category('All')">
					<li class="list-group-item">
					<h1>Semua</h1>
					</li>
				</button>	
				<button class="btn category" onclick="category('mobil')">
					<li class="list-group-item">
					<img src="{{asset('bootstrap-icons/car-icon.png')}}" width="auto" height="50"><br>Mobil
					</li>
				</button>
				<button class="btn category" onclick="category('spare parts')">
					<li class="list-group-item">
					<img id="gear_icon" src="{{asset('bootstrap-icons/gear-icon.png')}}" width="auto" height="50"><br>
					Suku Cadang
					</li>
				</button>	
			</ul>
		</div>
		<!-- End Kategori -->

	</div>
</main>
<hr>
<footer>
	<div class="container text-center">
		<h4>@COPYRIGHT CAR COMMUNITY</h4>
	</div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{ asset('js/showroom.js')}}" type="text/javascript"></script>
</body>
</html>