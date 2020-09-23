@extends('layouts.SNapp')

@section('title', 'Message')

@section('header')
	<h1>Message</h1>
@stop

@section('content')
<div class="row">
	<div class="col-sm-3">
		<div class="card" style="padding: 1rem;">
			<form class="form-inline mb-2">
			    <input class="form-control mr-sm-2" type="search" placeholder="Cari teman online" aria-label="Search">
			    <button class="btn btn-outline-primary my-2 my-sm-0 btn-sm" type="submit">Search</button>
			</form>
			<div class="text-center" style="font-size: 20px; background-color: #CFE8E8;">Online Friends</div>
			<div class="w-100"><!-- new line --></div>
				<ul>
					<li>Irsam</li>
					<li>Takhjudin</li>
					<li>Fillah</li>
				</ul>
		</div>
	</div>

	<div class="card col-sm-9 bg-light" >
  		<div class="card-header" style="font-size: 20px; background-color: #CFE8E8;">Fillah</div>
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
