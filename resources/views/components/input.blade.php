@php
	$newName = $name.($type==='file' && (strpos($options, 'multiple') !== false) ? '[]' : '' );
@endphp

<div class="form-group row {{ $errors->has($name) ? 'has-danger' : ''}}">
	<label for="{{ $newName }}" class="col-sm-3 form-control-label my-md-auto">{{ $label }}</label>
	<div class="col-sm-9">
	@if($type=='textarea')
		<textarea name="{{ $newName }}" class="form-control" rows="4" id="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ $value or old($name) }}" {{ $options }}></textarea>
	@else
		<input type="{{ $type }}" name="{{ $newName }}" class="form-control" id="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ $value or old($name) }}" {{ $options }}>
	@endif
	@if ($newName != $name)
		@foreach ($errors->all() as $message)
			<div class="form-control-feedback text-danger">{{ $message }}</div>
		@endforeach
	@else
		@foreach ($errors->get($name) as $message)
			<div class="form-control-feedback text-danger">{{ $message }}</div>
		@endforeach
	@endif
	</div>
</div>