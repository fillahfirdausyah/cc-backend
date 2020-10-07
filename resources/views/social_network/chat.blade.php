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

	<div class="card col-sm-8 bg-light" >
  		<div class="card-header" style="font-size: 20px; background-color: #CFE8E8;">
	  		<div class="row">
	  			<div class="col">
	  				<img src="/bootstrap-icons/person.svg" width="30" height="30" style=" border:1px solid #000000; border-radius: 50%;">
	  				<span>Fillah</span>
	  				<button class="btn float-right" style="box-shadow: none;">
		  				<img src="/bootstrap-icons/list.svg" alt="" width="25" height="25">
					</button>
	  			</div>
	  		</div>
  		</div>
  		<div class="card-body">
    		<div class="">
    			
    		</div>	
    	</div>
    	
    	<form class="form-inline">
		  <div class="form-group col-sm-10 mb-2">
		  	<textarea class="form-control" cols="100" placeholder="Masukkan Pesan anda disini"></textarea>
		  </div>
		  	<button type="submit" class="btn btn-primary mb-2 col-sm-2">Send</button>
		</form>
	</div>
</div>
@stop

@section('js')
<script type="text/javascript">
	
</script>