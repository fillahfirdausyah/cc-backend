@extends('admin.layouts.master')

@section('title', 'Undian')

@push('css-page')
<link rel="stylesheet" href=" {{ asset('assets/vendor/slotmachine/app.css') }} ">
@endpush

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Undian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
              <li class="breadcrumb-item active">Undian</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
             <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Undian</h3>
                </div>
                <!-- /.card-header -->
                <center>
                <div class="card-body">
                    {{-- Here --}}
                    <div class="slotwrapper" id="example9">
                        <ul>
                            <li>1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>4</li>
                            <li>5</li>
                            <li>6</li>
                            <li>7</li>
                        </ul>
                        <ul>
                            <li>1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>4</li>
                            <li>5</li>
                            <li>6</li>
                            <li>7</li>
                        </ul>
                        <ul>
                            <li>1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>4</li>
                            <li>5</li>
                            <li>6</li>
                            <li>7</li>
                        </ul>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary btn-lg" id="btn-example9-start">Start</button>
                    <button type="button" class="btn btn-primary btn-lg" id="btn-example9-stop">Stop</button>
                </div>
                </center>
                <!-- /.card-body -->
              </div>
             </div>
           </div>
        </div>
    </section>
</div>
    
@endsection

@push('js-asset')
{{-- <script src="{{ asset('assets/js/undian.min.js') }}"></script> --}}
<script src="{{ asset('assets/vendor/slotmachine/slotmachine.min.js') }}"></script>
@endpush

@push('js-page')
<script>
$('#btn-example9-start').click(function() {
    $('#example9 ul').playSpin({
        manualStop: true,
        easing: 'easeOutBack',
    });
});

$('#btn-example9-stop').click(function() {
    $('#example9 ul').stopSpin();
    alert(endNum);
});
</script>
@endpush