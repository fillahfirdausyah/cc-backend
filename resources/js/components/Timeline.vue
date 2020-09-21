@extends('layouts.SNapp')

@section('title', 'Timeline')

@section('header')
	<div class="col text-center">
		<h1>Timeline</h1>
	</div>
@stop

@section('content')
		<div class="input-group mb-3">
		  	<input type="text" class="form-control" placeholder="Share Yuk..." aria-describedby="button-addon2">
			<div class="input-group-append">
		    	<button class="btn btn-outline-secondary" type="button" id="button-addon2">POST</button>
		 	</div>
		</div>
<div class="row">
	<div class="col-md-3">
		<img src="#" class="rounded img-thumbnail" alt="#">
	</div>
	<div class="col-md-9">
		<div class="card" style="width: 90%;">
		  	<div class="card-body">
		    	<h5 class="card-title">Judul Post</h5>
		    	<p class="card-text">Fillah Bokepers</p>
		    	<form class="form-inline">
		    		<textarea class="form-control" rows="3" cols="60" placeholder="Sabda Netizennya bang..."></textarea>
		    		<button type="submit" class="btn btn-primary mb-2">Kirim</button>
		    	</form>
		  	</div>
		</div>
	</div>	
</div>
@stop
<script>
    export default {


    }
</script>