<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <title>@yield('title')</title>
</head>

  <style type="text/css">
    .card
    {

    }
  </style>

<!-- NAVBAR -->
<body>
<div class="container">
  <nav>
    <a href="#">CAR COMMUNITY</a>
    <ul class="nav navbar-light bg-light justify-content-end">
      <li class="nav-item">
        <a class="nav-link" href="/user/timeline">Timeline</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/user/chat">Chat</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profile</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/user/profile">Description</a>
          <a class="dropdown-item" href="/user/image">Images</a>
          <a class="dropdown-item" href="/user/friend">Friend</a>
        </div>
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
        <h4 class="modal-title" id="myModalLabel">Logout</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary">Logout</button>
      </div>
    </div>
  </div>
</div>
<!-- END NAVBAR -->


<div class="container">     
    <!-- CONTENT -->
    <div class="col">
      <div class="card">
        <div class="card-header">
          @yield('header')
        </div>
        <div class="card-body">
          <p class="card-text">@yield('content')</p>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- FOOTER -->
<div class="row justify-content-center">
  <div class="row d-flex justify-content-center col-sm-1">
    <a href="#">Contact Us</a>
  </div>
  <div class="row d-flex justify-content-center col-sm-1">
    <a href="#">Help</a>
  </div>
  <div class="row d-flex justify-content-center col-sm-1">
    <a href="#">Feedback</a>
  </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>