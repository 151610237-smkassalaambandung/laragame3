@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Dashboard</a></li>
				<li><a href="{{ url('/admin/kategoris') }}">Kategori</a></li>
				<li class="active">Ubah Kategori</li>
			</ul>
			<div class="panel " style="background-color: rgba(225,225,225,0.8);">
				<div class="panel-heading" style="background-color:dodgerblue">
					<h2 class="panel-title">Ubah Kategori</h2>
				</div>
				<div class="panel-body">
					{!! Form::model($kategori, ['url'=>route('kategoris.update', $kategori->id), 'method'=>'put', 'class'=>'form-horizontal']) !!}
					@include('kategoris._form')
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection