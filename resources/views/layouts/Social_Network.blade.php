<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">	

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- Asset  -->
	<!-- <script src="{{ asset('js/SNapp.js') }}" defer></script> -->
    <link href="{{ asset('css/SNapp.css') }}" rel="stylesheet">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<title>@yield('title')</title>
</head>
<body>
<header class="fixed-top">
	<!-- Navbar  #5a5af3-->
	<div class="container">	    
	<nav>
	  	<div class="navbar-header">
	      	<a class="navbar-brand" href="/user/" style="font-size: 200%;">CAR COMMUNITY</a>
	    </div>        
	    <ul class="nav justify-content-end">
	    	<li class="nav-item">
	        	<a class="nav-link" href="/user/">Timeline</a>
	    	</li>
	      	<li class="nav-item dropdown">
	        	<a class="nav-link dropbtn">Profile</a>
	        	<div class="dropdown-content">
	          		<a class="nav-link" href="/user/profile">Description</a>
	          		<a class="nav-link" href="/user/image">Images</a>
	          		<a class="nav-link" href="/user/friend">Friend</a>
	        	</div>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link" href="/user/chat">Chat <span class="badge badge-info">0</span></a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link" href="/user/notification">Notifications <span class="badge badge-info">0</span></a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link" data-toggle="modal" data-target="#modal-logout" href="#">Logout</a>
	      	</li>
	    </ul>
  	</nav>
  	</div>
  	<!-- MODAL -->
  	<div class="modal fade" id="modal-logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
		    <div class="modal-content">
		        <div class="modal-header">
		          <h4 class="modal-title" id="myModalLabel">Logout</h4></br>
		        </div>  
		        <div class="modal-body">
		          <p>Apakah anda yakin ingin Logout?</p>
		        </div>     
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
		          <button type="button" class="btn btn-primary">Logout</button>
		        </div>
			</div>
		</div>
	</div>
	<!-- END NAVBAR -->
</header>

<main id="main">
	<!-- START CONTAINER -->
	<section id="isi">
		<div class="container content d-flex">
			<div class="row">
			@yield('container')
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

			<br>
			<br>
			<br>
			<br>

			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

			<br>
			<br>
			<br>
			<br>

			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.


			<br>
			<br>
			<br>
			<br>

			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.


			<br>
			<br>
			<br>
			<br>

			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</div>
	</section>
</main>

<footer id="footer">
	<div class="footer-top">
		<div class="container">
			<div class="row justify-content-center text-center">
				<div class="col-sm">
					<a href=""><h4>Contact Us</h4></a>
				</div>
				<div class="col-sm">
					<a href=""><h4>Help</h4></a>
				</div>
				<div class="col-sm">
					<a href=""><h4>Feedback</h4></a>
				</div>
			</div>
		</div>
	</div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>