@extends('admin.resources.template')

@section('title')
	Upload a photo
@stop

@section('affichage')
<div class="container-fit">
	{{ Form::open(['action' => 'PhotosController@store', 'files' => true]) }}

		{{ Form::myInput('photo', 'file', 'Photo', null, false, 'multiple') }}
		{{ Form::myInput('caption', 'text', 'Caption', 'My photo') }}

		<div class="form-group text-right">
				<button type="submit" class="btn btn-primary">Upload</button>
		</div>
	{{ Form::close() }}
</div>
@endsection