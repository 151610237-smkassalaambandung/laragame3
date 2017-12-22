@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="{{ url('/home') }}">Dashboard</a></li>
				<li class="active">Kategori</li>
			</ul>
			<div class="panel " style="background-color: rgba(225,225,225,0.8);">
				<div class="panel-heading" style="background-color:dodgerblue">
					<h2 class="panel-title">Kategori</h2>
				</div>
				<div class="panel-body">
 					
 					 <p><a class="btn btn-primary" href="{{url('/admin/kategoris/create')}}">
 					 Tambah</a></p>
 					{!! $html->table(['class'=>'table-striped']) !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
{!! $html->scripts() !!}
@endsection