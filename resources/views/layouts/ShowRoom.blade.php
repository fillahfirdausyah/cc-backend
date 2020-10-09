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
		<div class="row" id="myTopnav">
			<div class="col-8 d-flex justify-content-center">
				<button class="btn sm-btn" id="defaultOpen" onclick="openPage(event, 'mobil')">Mobil</button>
				<button class="btn sm-btn" onclick="openPage(event, 'sparepart')">Spare Parts</button>
			</div>
			<div class="col-4 d-flex justify-content-end">
				<form class="form-inline my-2 my-lg-0">
			      	<input class="form-control mr-sm-2 text-center" type="search" placeholder="Search" aria-label="Search">
			      	<button class="btn my-2 my-sm-0 sm-btn" type="submit">Search</button>
			    </form>
			</div>
		</div>
	</nav>

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
	    <h5 class="mt-2 cc">COMMERCE</h5>
	    <a href="/upload"><button class="btn btn-primary" type="button">Mau jualan juga gan? Klik sini</button></a>
	    </div>
	</div>
</div>
	
	<div class="row">
		
		<!-- Content -->
		<div class="col-lg-10 content2"></div>
		
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
<script src="{{ asset('js/showroom.js')}}" type="text/javascript"></script>
</body>
</html>