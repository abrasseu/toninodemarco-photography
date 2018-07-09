@extends('admin.resources.template')

@section('title')
	Edit this photo
@stop

@section('affichage')
<div class="container-fit">
	{{ Form::open(['action' => [ 'PhotosController@update', $photo ]]) }}
		{{ method_field('PUT') }}

		<img class="img-fluid mx-auto d-block mb-3" src="{{ asset($photo->path) }}" style="max-height: 300px;">
		{{ Form::myInput('caption', 'text', 'Caption', 'My photo', $photo->caption) }}

		<div class="form-group text-right">
				<button type="submit" class="btn btn-primary">Update</button>
		</div>
	{{ Form::close() }}
</div>
@endsection