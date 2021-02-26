<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Font Icon -->
	<link rel="stylesheet" href="{{ asset('assets/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>
<body>
	<div class="main">
		<section class="sign-in">
            <div class="container">
                @if (session('status'))
                   <center>
                    {{ session('status') }}
                   </center> 
                @endif
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{ asset('assets/img/reset.png') }}" alt="sing up image"></figure>
                        <a href="{{ route('register') }}" class="signup-image-link">Create an account</a>
                        @if (Route::has('password.request'))
                            <a class="signup-image-link" href="{{ '/login' }}">Login</a>
                        @endif
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Reset Password</h2>
                        <form method="POST" class="register-form" id="login-form" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email material-icons-name"></i></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required  placeholder="Email" autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Kirim link reset password"/>
                            </div>
                        </form>	
                    </div>
                </div>
            </div>
        </section>
	</div>

	<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/login.js') }}"></script>
</body>