<div class="form-group{{ $errors->has('judul') ? 'has-error' : '' }}">
	{!! Form::label('judul','Judul',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('judul',null,['class'=>'form-control']) !!}
		{!! $errors->first('judul', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('deskripsi') ? 'has-error' : '' }}">
	{!! Form::label('deskripsi','Deskripsi',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::textarea('deskripsi',null,['class'=>'form-control']) !!}
		{!! $errors->first('deskripsi', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('tanggal') ? 'has-error' : '' }}">
	{!! Form::label('tanggal','Tanggal',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('tanggal',null,['class'=>'form-control']) !!}
		{!! $errors->first('tanggal', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('kategori_id') ? 'has-error' : '' }}">
	{!! Form::label('kategori_id','Kategori',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::select('kategori_id',[''=>'']+App\Kategori::pluck('Kategori','id')->all(), null,['class'=>'form-control'])  !!}
		{!! $errors->first('kategori_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('cover') ? ' has-error' : '' }}">
	{!! Form::label('cover','Cover',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::file('cover',['class'=>'btn btn-default']) !!}

		@if(isset($berita) && $berita->cover)
		<p>
        {!! Html::image(asset('img/'.$berita->cover.''),null,['class'=>'img-rounded img-responsive'])!!}
		</p>
		@endif


		{!! $errors->first('cover', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>