@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li> <a href="{{url('/home')}}"> Dashboard </a> </li>
					<li> <a href="{{url('/admin/beritas')}}"> Berita </a> </li>
					<li class="active"> Tambah Berita </li>
				</ul>
				<div class="panel " style="background-color: rgba(225,225,225,0.8);">
					<div class="panel-heading" style="background-color:dodgerblue">
						<h2 class="panel-title" >  Tambah Berita </h2>
					</div>

					<div class="panel-body">
						{!! Form::open(['url'=>route('beritas.store'),
						'method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
						@include('beritas._form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection
