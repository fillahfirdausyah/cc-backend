<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <title>@yield('title')</title>
  <style type="text/css">
    body{
      background-color: #EDF2F2;
    }

    nav{
     font-weight: 700;
     text-decoration: none 
    }

    .footer{
      font-weight: 700;
    }

    .nav-link{
      font-size: 110%;
      color: #384545; 
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: #384545;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {background-color: #ddd;}

    .dropdown:hover .dropdown-content {display: block;}
  </style>
</head>
<body>

<!-- NAVBAR --> 
<div class="container">
  <nav>
    <a href="/user/" style="text-decoration: none;"><h2 class="carcommunity mt-2">CAR COMMUNITY</h2></a>
    <ul class="nav navbar-light bg-light justify-content-end">
      <li class="nav-item">
        <a class="nav-link" href="/user/">Timeline</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/user/chat">Chat <span class="badge badge-info">0</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropbtn">Profile</a>
        <div class="dropdown-content">
          <a href="/user/profile">Description</a>
          <a href="/user/image">Images</a>
          <a href="/user/friend">Friend</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/user/notification">Notifications <span class="badge badge-info">0</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link col-lg-2" data-toggle="modal" data-target="#modal-logout" href="#">Logout</a>
      </li>
    </ul>
  </nav>
</div>

<!-- Modal -->
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
    
<!-- CONTENT -->
<div class="container">
    <div class="col">
      <div class="card">
        <div class="card-header">
            <div class="row justify-content-center">
              @yield('header')
            </div>
        </div>
        <div class="card-body">
          <p class="card-text">@yield('content')</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- FOOTER -->
<div class="footer">
  <div class="container">
    <div class="row justify-content-center bg-light">
      <div class="row d-flex justify-content-center col-sm-2">
        <a href="#">Contact Us</a>
      </div>
      <div class="row d-flex justify-content-center col-sm-2">
        <a href="#">Help</a>
      </div>
      <div class="row d-flex justify-content-center col-sm-2">
        <a href="#">Feedback</a>
      </div>
      <div class="w-100"></div>
    </div>
  </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
</body>
</html>