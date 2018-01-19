@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li> <a href="{{url('/')}}"> Dashboard </a> </li>
					<li> <a href="{{url('/guest/home')}}">berita</a> </li>
					<li class="active">Detail {{ $berita->judul }}</li>
				</ul>

				<div class="panel " style="background-color: rgba(225,255,255,0.8);">
					<div class="panel-heading" >
						<h2 class="panel-title">Detail {{ $berita->judul }}</h2>
						<div class="panel-body">
							<center> <h1> {{ $berita->judul }} </h1> </center> <br>
							<center>
							@if(isset($berita) && $berita->cover)
							<p>
					        {!! Html::image(asset('img/'.$berita->cover.''),null,['class'=>'img-rounded img-responsive'])!!}
							</p>
							@endif <br>
							</center>
							<p> {!! $berita->deskripsi !!} </p>
						</div>
					</div>
			  	</div>
			</div>
		</div>
	</div>
@endsection
