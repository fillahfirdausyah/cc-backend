@extends('admin.layouts.master')

@section('title', 'News')
    
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Text Editors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Text Editors</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <a href="{{ '/admin/news/add' }}" class="btn btn-primary">Tambah News</a>
                  <tr>
                    <th>Judul</th>
                    <th>Content</th>
                    <th>Tanggal</th>
                    <th>Preview</th>
                  </tr>
                  </thead>
                  <tbody>
                      <tr>
                          
                      </tr>
                  </tfoot>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
       </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
</div> 

@endsection