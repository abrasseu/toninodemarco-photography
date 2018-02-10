@extends('admin.resources.template')

@section('title')
	All your slides <span class="badge badge-primary">{{ $slides->count() }}</span>
@stop


@section('controls')
	<a href="{{ route('slides.select') }}" class="btn btn-lg btn-success">Select all</a>
	<a href="{{ route('slides.create') }}" class="btn btn-lg btn-primary">Add a slide</a>
@stop


@section('affichage')

<div class="card-columns">
	@foreach ($slides as $slide)
	<div class="card mt-2 shadow">
		<img class="card-img-top img-fluid" src="{{ asset($slide->photo->path) }}">
		<div class="card-block">
			<h4 class="card-title mb-0">{{ $slide->photo->caption, 'No title'}}</h4>
		</div>
		<div class="card-footer text-center">
			<a href="{{ route('slides.edit', $slide) }}" class="btn btn-outline-warning">Modify</a>
			<a href="{{ route('slides.destroy', $slide) }}" class="btn btn-outline-danger">Delete</a>
		</div>
	</div>
	@endforeach
</div>

@stop