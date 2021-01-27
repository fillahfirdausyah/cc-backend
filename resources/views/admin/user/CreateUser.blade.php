@extends('admin.layouts.master')

@section('title', 'Tambah User')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Tambah User</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Tambah User</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Data User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ '/admin/user/store' }}" method="GET">
                            @csrf
                          <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" id="name" placeholder="Nama">
                                @error('name')
                                    <div class="alert alert-danger">
                                      {{ $message }}  
                                    </div>                                    
                                @enderror
                            </div>
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" placeholder="Enter email">
                              @error('email')
                                    <div class="alert alert-danger">
                                      {{ $message }}  
                                    </div>                                    
                                @enderror
                            </div>
                            <div class="form-group">
                              <label for="password">Password</label>
                              <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" id="password" placeholder="Password">
                              @error('password')
                                    <div class="alert alert-danger">
                                      {{ $message }}  
                                    </div>                                    
                                @enderror
                            </div>
                            <div class="form-group">
                              <label for="Role">Role</label>
                              <input type="Role" class="form-control" value="{{ old('role') }}" name="role" id="Role" placeholder="Role">
                            </div>
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

@endsection