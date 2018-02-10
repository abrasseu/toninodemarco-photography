<div class="form-group row {{ $errors->has($name) ? 'has-danger' : ''}}">
	<label for="{{ $name }}" class="col-sm-3 form-control-label">Choose a {{ $name }} :</label>
	<div class="col-sm-9">
		<select name="{{ $name }}" class="form-control" id="{{ $name }}">
			@foreach ($photos as $photo)
				<option value='{{ $photo->id }}' {{ isset($model) ? ($model->{$name.'_id'} === $photo->id ? 'selected' : '') : '' }} data-link='{{ asset($photo->path) }}'>{{ $photo->id }} - {{ $photo->caption }}</option>
			@endforeach
			{{-- <img src="{{ asset($photo->path) }}"> AVEC JAVASCRIPT --}}
		</select>
		{!! $errors->first('{{ $name }}', '<div class="form-control-feedback text-danger">:message</div>') !!}
	</div>
</div>