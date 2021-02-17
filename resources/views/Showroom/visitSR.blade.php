<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<title>@yield('title')</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('css/visitSR.css')}}">
</head>
<body style="margin-bottom: 10px;">

<header>
	<div class="back" style="margin-left: ">
		<a href="/showroom/more/sr"><img src="{{ asset('bootstrap-icons/arrow-left.svg')}}" width="60" height="40"></a>
	</div>
</header>
<main>
<section>
<div class="container">
	<div class="row">
		<div class="col-3">

			<!-- Start Recommend -->
			<div class="card mb-2 recommend_head">
				<h4>Recomended</h4>
			</div>
			<div class="card recommend_body">
				@foreach($recomendations as $recommend =>$key)
					<div class="img-fluid rekomendasi img-rounded"><img src="{{ asset('public/image/'.$recommend_img[$recommend]) }}"></div>
					<h5 class="card-title mt-2"><a href="{{'/showroom/'.$key->id.'-'.$key->slug }}">{{ $key->judul }}</a></h5>
					<hr>
				@endforeach
			</div>
			<!-- End Recommend -->

		</div>
		<div class="col-8">
			<div class="card">
				<div class="container-fluid" style="background-color: #FAFAFA;">

					<!-- Start Content -->
					<div>
						@foreach($collect as $pict)
						<div class="mySlide sliding">
							<img width="100%" src="{{ asset('public/image/'.$pict) }}" height="350" style="margin-top: 20px;  margin-bottom: 5px;">
						</div>
						@endforeach
					</div>
					<div class="">
					<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
					<a class="next" onclick="plusSlides(1)">&#10095;</a>
					</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-auto d-flex">
						<div class="card-title"><h2><strong>{{ $SR->judul }}</strong></h2></div>	
						</div>
					</div>
					@if($SR->promo == NULL)
						<p class="card-text" id="harga">Harga <strong>Rp.{{ $SR->harga }}</strong> <small>({{ $SR->stok }})</small></p>
					@elseif($SR->promo != NULL)
						<p class="card-text" id="harga">Harga <del><strong>Rp.{{ $SR->harga }}</strong></del> <small>({{ $SR->stok }})</small></p>
						<p class="card-text">  <strong> Promo {{ $SR->promo }}%,  harga menjadi Rp.{{ $SR->harga*(100-$SR->promo)/100 }}</strong></p>
					@endif
					<div class="row">
						@can('Update-sr', $SR)	
						<div class="col-md-6 d-flex">
						<a href="{{'/showroom/promo/'.$SR->id}}"><button class="btn-sm btn-info">Promo</button></a>
						<form method="post" action="{{ url('/showroom/edit/'.$SR->id)}}">
							@csrf
							<input type="submit" class="btn-sm btn-success" name="" value="Edit">
						</form>	
						<form method="post" action="{{ '/showroom/stok/'.$SR->id}}">
							@csrf
							@if($SR->stok == "Tersedia")
								<input type="hidden" name="stok" value="Habis">
								<input class="btn-sm btn-warning" type="submit" value="Tandai Habis">
							@elseif($SR->stok == "Habis")
								<input type="hidden" name="stok" value="Tersedia">
								<input class="btn-sm btn-warning" type="submit" value="Tandai Tersedia">
							@endif
						</form>
						<form method="post" action="{{ route('delete',['id' => $SR->id]) }}">
							@method('delete')
							@csrf
							<input type="submit" class="btn-sm btn-danger" name="" value="Delete">
						</form>
						</div>
						@endcan
					</div>
					<hr>
					<p class="card-text">{{ $SR->deskripsi }}</p>
					<br>
					<p class="card-text"><small>Last Updated {{ $SR->created_at }}</small></p>
					<!-- End Content -->

					<!-- Start Like -->
					<p class="card-text" class="like">
						<input type="hidden" id="post_id" name="post_id" value="{{ $SR->id }}" class="form-control">
						<input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}" class="form-control">
						<button class="btn-sm btn-primary" onclick="like()"><span id="total_like" class="badge badge-primary" style="font-size: 12px;">{{ $likes }}</span> <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></button>
					</p>
					<!-- End Like -->

					<!-- Start Fill Comment -->
					<div class="card-footer">
						<form  method="post" action="{{ url('/showroom/comment') }}">
							@csrf
							<div class="form-group">
								<input type="hidden" name="id" value="{{ $SR->id }}" class="form-control">
								<input type="hidden" name="user_id" value="{{ $user->id }}" class="form-control">
						    	<label for="comment">Komentar</label>
						    	<textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
						  	</div>
						  	<div class="form-group">
						  		<input type="submit" class="btn" name="send" value="Kirim">
						  	</div>
						</form>
					</div>
					<!-- End Fill Comment -->
				</div>
			</div>

			<!-- Show comment -->
			<div class="sesi_komentar">Komentar</div>
			<div class="field-comment">
				<div class="card">
					@if( $comment != NULL)
						@foreach( $comment->comment as $com)
						<div class="card-body">
							<div class="card-title"><strong>{{ $com->user->name }}</strong></div>
							<p>{{ $com->comment }}</p>
							<button class="btn btn-sm tombol_reply mb-2"> Balas </button>
							<div class="reply">
								<form method="post" action="{{url('/showroom/comment')}}">
									@csrf
									<input type="hidden" name="parent_id" id="parent_id" class="form-control" value="{{ $com->id }}">
									<input type="hidden" name="id" value="{{ $SR->id }}" class="form-control">
									<input type="hidden" name="user_id" value="{{ $user->id }}" class="form-control">
									<div class="form-group">
									 	<textarea name="comment" placeholder="Balas..." cols="50" rows="3" id="reply_comment"></textarea>
									</div>
									<div class="form-group tombol">
										<input type="submit" class="btn btn-sm" value="Kirim">
										<button class="btn btn-sm" onclick="cancel()">Batal</button>
									</div>
								</form>
							</div>
							@foreach( $com->child as $child)
							<div class="card-title"><strong>{{ $child->user->name }}</strong></div>
							<div class="child_comment">
								<blockquote>
									<p>{{ $child->comment}}</p>	
								</blockquote>
							</div>
							@endforeach
						</div>
						@endforeach
					@else
						<div class="card mx-auto">Komentar Kosong</div>
					@endif
				</div>
			</div>
			<!-- End Show Comment -->

		</div>
	</div>
</div>
</section>
</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{ asset('js/visitSR.js')}}" type="text/javascript"></script>
</body>
</html>

