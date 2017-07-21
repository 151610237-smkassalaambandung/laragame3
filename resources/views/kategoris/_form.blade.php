<div class="form-group{{ $errors->has('kategori') ? 'has-error' : '' }}">
	{!! Form::label('kategori','Kategori',['class'=>'col-md-2 control-label']) !!}
	<div class="col-md-4">
		{!! Form::text('kategori',null,['class'=>'form-control']) !!}
		{!! $errors->first('kategori', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group">
	<div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
	</div>
</div>