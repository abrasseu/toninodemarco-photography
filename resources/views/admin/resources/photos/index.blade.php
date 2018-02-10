@extends('admin.resources.template')

@section('title')
	All your photos <span class="badge badge-primary">{{ $photos->count() }}</span>
@stop

@section('controls')
	<a href="{{ route('photos.create') }}" class="btn btn-primary btn-lg">Upload a photo</a>
@stop

@section('affichage')
<div class="card-columns">

	@foreach ($photos as $photo)
	<div class="card mt-2">
		<a href="{{ asset($photo->path) }}">
			<img class="card-img-top img-fluid" src="{{ asset($photo->path) }}">
		</a>
		<div class="card-block">
			<h4 class="card-title">{{ $photo->caption, 'No title'}}</h4>
		</div>
		<div class="card-footer text-center">
			<a href="{{ route('photos.edit', $photo) }}" class="btn btn-outline-warning">Modify</a>
			<a href="{{ route('photos.destroy', $photo) }}" class="btn btn-outline-danger">Delete</a>
		</div>
	</div>
	@endforeach

</div>
@endsection