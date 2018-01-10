@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel " style="background-color: rgba(225,225,225,0.8);">
					<div class="panel-heading" style="background-color:dodgerblue">
						<h2 class="panel-title">Daftar Berita</h2>
					</div>
					<div class="panel-body">
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