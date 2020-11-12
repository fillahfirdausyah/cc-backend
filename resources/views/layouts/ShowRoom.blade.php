<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
				<button type="button" class="btn btn-sm direction" onclick="direction('news')"> News </button>
				<button type="button" class="btn btn-sm direction" onclick="direction('event')"> Event </button>
				<button type="button" class="btn btn-sm direction" onclick="direction('commerce')"> E-Commerce </button>
				<div class="dropdown">
				  	<button class="dropbtn btn-sm directon">Navigation</button>
				  	<div class="dropdown-content">
				    	<a href="#">Dashboard</a>
				    	<a href="#">Social Network</a>
				    	<a href="http://cc.buanalintas.co.id/">Website</a>
				  	</div>
				</div>
			</div>
			<div class="col-3 mt-3 d-flex justify-content-center">
				<form class="form-inline my-2 my-lg-0">
					@csrf
					<div class="container">
						<input class="form-control text-center" id="search" type="text" placeholder="Cari">
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
				<img width="100%" src="{{ asset('image/1.jpg') }}" height="350" style="margin-top: 100px;  margin-bottom: 5px;">
			</div>
			<div class="mySlide sliding">
				<img width="100%" src="{{ asset('image/2.jpg') }}" height="350" style="margin-top: 110px;  margin-bottom: 5px;">
			</div>
			<div class="mySlide sliding">
				<img width="100%" src="{{ asset('image/3.jpg') }}" height="350" style="margin-top: 110px;  margin-bottom: 5px;">
			</div>
			<div style="text-align:center">
			  	<span class="dot" onclick="currentSlide(1)"></span> 
			  	<span class="dot" onclick="currentSlide(2)"></span> 
			  	<span class="dot" onclick="currentSlide(3)"></span> 
			</div>
		</div>
	</div>

<hr>

<div class="container text-center my-3">
   	<!-- Event -->
   	<div class="row justify-content-center mb-2" id="event">
   		<div class="col-4 justify-content-center">
   			<h2 class="font-weight-normal" style="color:#434175;">Event</h2>
   		</div>
   	</div>
   	<div>
	    <div class="row mx-auto my-auto">
	        <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
	            <div class="carousel-inner w-100" role="listbox">
	                <div class="carousel-item active">
	                    <div class="col-md-4">
	                        <div class="card card-body">
	                            <a href=""><img class="img-fluid" src="http://placehold.it/380?text=1"></a>
	                        </div>
	                    </div>
	                </div>
	                <div class="carousel-item">
	                    <div class="col-md-4">
	                        <div class="card card-body">
	                            <a href=""><img class="img-fluid" src="http://placehold.it/380?text=2"></a>
	                        </div>
	                    </div>
	                </div>
	                <div class="carousel-item">
	                    <div class="col-md-4">
	                        <div class="card card-body">
	                            <a href=""><img class="img-fluid" src="http://placehold.it/380?text=3"></a>
	                        </div>
	                    </div>
	                </div>
	                <div class="carousel-item">
	                    <div class="col-md-4">
	                        <div class="card card-body">
	                            <a href=""><img class="img-fluid" src="http://placehold.it/380?text=4"></a>
	                        </div>
	                    </div>
	                </div>
	                <div class="carousel-item">
	                    <div class="col-md-4">
	                        <div class="card card-body">
	                            <a href=""><img class="img-fluid" src="http://placehold.it/380?text=5"></a>
	                        </div>
	                    </div>
	                </div>
	                <div class="carousel-item">
	                    <div class="col-md-4">
	                        <div class="card card-body">
	                            <a href=""><img class="img-fluid" src="http://placehold.it/380?text=6"></a>
	                        </div>
	                    </div>
	                </div>
	            </div>
                <a class="carousel-control-prev w-auto" href="#recipeCarousel" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next w-auto" href="#recipeCarousel" role="button" data-slide="next">
				    <span class="carousel-control-next-icon bg-dark border border-dark rounded-circle" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				</a>
	        </div>
	    </div>
	    <br>
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
	    		<h2 class="font-weight-normal" style="color:#434175;">E-Commerce</h2>
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
				<div class="row">
					@if($SR != NULL)
					@foreach($SR as $item => $key)
					<div class="col-md-4 card-group">
						<div class="card" style="padding: 5px; margin-top:10px;">
							<img class="card-img-top" src="{{ url('/public/image/'.$collect[$item]) }}" width="250" height="180" alt="">
							<div class="card-body">
								<h4 class="card-title"><a href="{{'/showroom/'.$key->id.'-'.$key->slug }}">{{ $key->judul }}</a></h4>
								<p class="card-text"><strong>Rp.{{ $key->harga }}</strong></p>
								<p class="card-text">{{ \Str::limit($key->deskripsi,50) }}</p>
								<p class="card-text"><small class="text-muted">Updated on {{ $key->created_at }}</small></p>
							</div>
						</div>
					</div>	
					@endforeach
					@endif
				</div>
			</section>	
		</div>

		<!-- Kategori -->
		<div class="col-lg-2 text-center" id="category">
			<h3 style="color:#434175; display: block;">Kategori</h3>
			<ul class="list-group list-group-flush">
				<button class="btn category" onclick="category('All')">
					<li class="list-group-item">
					<h1>All</h1>
					</li>
				</button>	
				<button class="btn category" onclick="category('mobil')">
					<li class="list-group-item">
					<img src="{{asset('bootstrap-icons/car-icon.png')}}" width="auto" height="50"><br>CAR
					</li>
				</button>
				<button class="btn category" onclick="category('spare parts')">
					<li class="list-group-item">
					<img id="gear_icon" src="{{asset('bootstrap-icons/gear-icon.png')}}" width="auto" height="50"><br>
					SPARE PART
					</li>
				</button>	
			</ul>
		</div>
	</div>
</main>
<hr>
<footer>
	<div class="container text-center">
		<h4>@COPYRIGHT CAR COMMUNITY</h4>
	</div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{ asset('js/showroom.js')}}" type="text/javascript"></script>
</body>
</html>