@extends('admin.resources.template')

@section('title')
	Choose all photos in the folder '{{ $folder->name}}'
@endsection

@section('form')
	{{ Form::open(['action' => ['InFolderController@updateAll', $folder->id], 'method' => 'post']) }}
@stop

@section('controls')
	<button type="submit" class="btn btn-lg btn-success">Select !</button>
	<button type="reset" class="btn btn-lg btn-secondary">Reset</button>
@stop

{{-- {!! $errors->first('photo', '<div class="form-control-feedback text-danger">:message</div>') !!} --}}

{{-- TODO !!! PB!!!! btn-group checkbox n'apparait pas --}}

@section('affichage')
<div class="btn-groupd container card-columns " data-toggle="buttons">
	{{-- <div class="row btn-group" data-toggle="buttons"> --}}
		@foreach ($photos as $photo)
		{{-- <div class="col-sm-6 col-md-4 col-lg-3"> --}}
			<label class="btn btn-select {{ in_array($photo->id, $selected) ? 'active' : '' }}">
				<div class="card shadow">
					<img class="card-img-top img-fluid" src="{{ asset($photo->path) }}">
					<div class="card-block">
						<h4 class="card-title form-check-label">
							<input type="checkbox" class="checkbox-card form-check-input card-check" name="photo-{{ $photo->id }}" id="photo-{{ $photo->id }}"
								value="{{ $photo->id }}" {{ in_array($photo->id, $selected) ? 'checked' : '' }}>
							{{ $photo->caption }}
						</h4>
					</div>
				</div>
			</label>
		{{-- </div> --}}
		@endforeach
	{{-- </div> --}}
</div>
{{ Form::close() }}
</div>

@endsection