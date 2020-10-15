<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{asset('css/showroom.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/visitSR.css')}}">
<title>Showroom</title>
</head>
<body>

<header>
	<!-- Navigation Bar -->
	<nav class="fixed-top" id="navigation">
		<button id="icon" class="btn icon_btn" type="button"><img src="{{ asset('bootstrap-icons/list.svg') }}" width="20" height="20"></button>
		<div class="row justify-content-center" id="myTopnav">
			<div class="col-6 mt-3 d-flex justify-content-center">
				<form class="form-inline my-2 my-lg-0">
					@csrf
			      	<input class="form-control mr-sm-2 text-center" id="search" name="search" type="search" placeholder="Search" aria-label="Search" style="width:300px;">
			    </form>
			</div>
		</div>
	</nav>
	<!-- <div class="container" id="resultfield">
		<div class="row justify-content-center fixed-top" style="margin-top: 50px;">
			<div id="result" class="col-6"></div>
		</div>
	</div> -->
	<!-- Sponsor -->
	<div class="container-fluid" style="background-color: #FAFAFA;">
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
</header>

<main class="container">
<div class="container text-center my-3">
   	<!-- Update -->
   	<h2 class="font-weight-light">Update Terbaru</h2>
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
	    <h5 class="mt-2 cc">COMMERCE</h5>
	    <a href="/upload"><button class="btn btn-primary" type="button">Mau jualan juga gan? Klik sini</button></a>
	    </div>
	</div>
</div>
	<div class="row">	
		<!-- Content -->
		<div class="col-lg-10 content2">
			<!-- Spare Parts Section -->
			<section id="spare_parts" class="content">
					<div class="row" id="result">
						@foreach($SR as $sr)
							@foreach($show as $tampil)
								<div class="col-md-4 card-group">
									<div class="card" style="padding: 5px;">
										<img class="card-img-top" src="{{ url('public/image/'.$tampil) }}" width="250" height="180" alt="">
										<div class="card-body">
											<h5 class="card-title"><a href="{{'/visit/'.$sr->id }}">{{ $sr->judul }}</a></h5>
											<p class="card-text"><strong>Rp.{{ $sr->harga }}</strong></p>
											<p class="card-text">{{ $sr->deskripsi }}</p>
											<p class="card-text"><small class="text-muted">Updated on {{ $sr->created_at }}</small></p>
										</div>
									</div>
								</div>
							@endforeach
						@endforeach
					</div>
			</section>	
		</div>
		
		<!-- Kategori -->
		<div class="col-lg-2 category text-center">
			<h3>Kategori</h3>
			<ul class="list-group list-group-flush">
				<a href=""><li class="list-group-item">SUV</li></a>
				<a href=""><li class="list-group-item">MPV</li></a>
				<a href=""><li class="list-group-item">Hatcback</li></a>
				<a href=""><li class="list-group-item">Coupe</li></a>
				<a href=""><li class="list-group-item">Minivan</li></a>
			</ul>
		</div>
	</div>
</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{ asset('js/showroom.js')}}" type="text/javascript"></script>
</body>
</html>