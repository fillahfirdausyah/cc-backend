<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <!-- Main css -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}"> --}}
      <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>
<body>
	<div class="main">
		<section class="signup">
            <div class="container">
                <div class="signup-content">
                      <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <div class="card card-primary mt-5">
                                        <div class="card-header">
                                          <h3 class="card-title">Verifikasi Data Diri</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form role="form" action="#" method="POST" enctype="multipart/form-data">
                                            @csrf
                                          <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="name">Nama</label>
                                                        <input type="text" class="form-control is-valid" value="{{ Auth::user()->name }}" name="name" id="name" readonly>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="text" class="form-control is-valid" value="{{ Auth::user()->email }}" email="email" id="email" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                              <div class="col">
                                                <label for="iuran-pertama">Bukti iuran pertama</label>
                                                <div class="custom-file">
                                                  <input type="file" name="iuran-pertama" class="custom-file-input" id="customFile">
                                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                              </div>
                                              <div class="col">
                                                <label for="stnk">Foto STNK</label>
                                                <div class="custom-file">
                                                  <input type="file" name="stnk" class="custom-file-input" id="customFile">
                                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                              </div>
                                            </div>
                                              <label>Domisili</label>
                                              <select name="kategori" class="form-control" style="width: 100%;">
                                                <option selected="selected">Nasional</option>
                                                <option>Local</option>
                                              </select>
                                            </div>
                                          <!-- /.card-body -->
                          
                                          <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                          </div>
                                        </form>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
	</div>

	<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/login.js') }}"></script>
    <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script> 
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>  
</body>