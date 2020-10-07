@extends('layouts.SNapp')

@section('title', 'Friend')

@section('header')
	<h1>Friend List</h1>
@stop

@section('content')
<div class="row card mx-auto" style="width: 100%;">
	<div class="col-8">
		<ul>
			<li>
				<div class="col"><a href="">Nama</a></div>
				<form>
					<button class="form-control btn btn-sm">Delete Friend</button>
				</form>
			</li>
		</ul>
	</div>
</div>
@stop
