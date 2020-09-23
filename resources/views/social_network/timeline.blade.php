@extends('layouts.SNapp')

@section('title', 'Timeline')

@section('header')
	<h1>Timeline</h1>
@stop

@section('content')
<div class="row">
	<div class="col-md-8">
		<div class="card mb-3 bg-light" style="padding: 10px;">
			<form>
				<div class="form-group mb-1">
					<div class="custom-file col-md-6">
					  	<input type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFile03">
					  	<label class="custom-file-label" for="inputGroupFile03">Pilih Gambar Gan!</label>
					</div>
				</div>
				<div class="form-group mb-1">
				    <textarea id="caption_image" class="form-control" placeholder="Captionnya Juga Gan! ..."></textarea>
				</div>
				<div class="form-group mb-1" style="float: right;">
			    	<button type="submit" class="btn btn-primary">Kirim</button>
			 	</div>
			</form>
		</div>
	</div>
	<div class="col mb-4">
		<div class="card bg-light" style="padding: 5px;">
		    <form class="form-inline">
		        <input class="form-control" type="search" placeholder="Cari teman, group" aria-label="Search">
		        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
		    </form>
		</div>
	</div>
</div>

<div class="card rounded text-center mb-2" style="background-color: #CFE8E8;">
	<h2>Post</h2>	
</div>

<div class="row">
	<div class="col-md-3">
		<img src="https://s1.bukalapak.com/img/1810988512/large/Wing_Spoiler_Honda_Civic_Turbo_Type_R_Sedan___Plastik_Import.jpg" class="rounded img-thumbnail" alt="#">
	</div>
	<div class="col-md-9">
		<div class="card" style="width: 90%;">
		  	<div class="card-body">
		    	<h5 class="card-title">Civic Turbo</h5>
		    	<p class="card-text">Nih gan jagoan gue!</p>
		    	<form class="form-inline">
		    		<textarea class="form-control" rows="2" cols="50" placeholder="Komentar"></textarea>
		    		<button type="submit" class="btn btn-primary mb-2">Kirim</button>
		    	</form>
		  	</div>
		</div>
	</div>	
</div>
@stop

@section('js')

@stop