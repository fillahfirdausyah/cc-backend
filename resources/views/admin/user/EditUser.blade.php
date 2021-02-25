@extends('admin.layouts.master')

@section('title', 'Edit User')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit User</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit User</li>
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
                        <form role="form" action="{{ '/admin/user/update/' }}{{ $user->id }}" method="POST">
                            @csrf
                          <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name, old('name') }}" name="name" id="name" placeholder="Nama">
                                @error('name')
                                    <div class="alert alert-danger">
                                      {{ $message }}  
                                    </div>                                    
                                @enderror
                            </div>
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email, old('email') }}" name="email" id="email" placeholder="Enter email">
                              @error('email')
                                    <div class="alert alert-danger">
                                      {{ $message }}  
                                    </div>                                    
                                @enderror
                            </div>
                            <div class="form-group">
                              <label for="Role">Role</label>
                              <select name="role" id="Role" class="form-control">
                                <option>admin</option>
                                <option>bendahara</option>
                                <option>member</option>
                              </select>
                            </div>
                      </div>
                          <!-- /.card-body -->
          
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Edit</button>
                          </div>
                        </form>
                      </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection