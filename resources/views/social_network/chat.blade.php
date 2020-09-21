@extends('layouts.SNapp')

@section('title', 'Message')

@section('header')
	<div class="col text-center">
		<h1>Message</h1>
	</div>
@stop

@section('content')
<div class="row">
	<div class="online col-sm-3">
		<form class="form-inline mb-2">
		    <input class="form-control mr-sm-2" type="search" placeholder="Cari teman" aria-label="Search">
		    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
		<div class="online bg-light text-center" style="font-size: 20px;">Online Friends</div>
		<div class="online w-100"><!-- new line --></div>
		<div class="online3">
			<ul>
				<li>Irsam</li>
				<li>Takhjudin</li>
				<li>Fillah</li>
			</ul>
		</div>
	</div>

	<div class="card bg-light col-sm-9">
  		<div class="card-header" style="font-size: 20px;">Fillah</div>
  		<div class="card-body">
    		<div class="">
    			
    		</div>	
    	</div>
    	
    	<form class="form-inline">
		  <div class="form-group col-sm-11 mb-2">
		  	<textarea class="form-control" cols="100" placeholder="Masukkan Pesan anda disini"></textarea>
		  </div>
		  	<button type="submit" class="btn btn-primary mb-2 col-sm-1">Kirim</button>
		</form>
	</div>
</div>
@stop
