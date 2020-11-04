@extends('admin.layouts.master')

@section('title', 'Undian')

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
                <div class="card-body">
                    <center>
                      <div id="lotteryMachine"></div>
                      <button class="btn btn-primary" onclick="start()">Start</button>
                    </center>
                </div>
                <!-- /.card-body -->
              </div>
             </div>
           </div>
        </div>
    </section>
</div>
    
@endsection

@push('js-asset')
<script src="https://www.jaypung.com/js/luckyball/lotteryMachine.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@push('js-page')
<script>
$(function() {
    var machine = $("#lotteryMachine").lotteryMachine({
        containerRadius: 150,
        waitInterval: 1500,
        playSound: true,
        callback: function(data){
          let hasil = data.toString();
          swal("Hasil Undian", hasil, "info");
            // alert(data); //On finish running lottery numbers, do something
        }
    });
});
function start() {
  let number = Math.floor(1000 + Math.random() * 9000);
	//Run the ball machine to give specific number
	$("#lotteryMachine").lotteryMachine('run', number);
}
</script>
@endpush