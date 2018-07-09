@extends('admin.resources.template')

@section('title')
	All your photos <span class="badge badge-primary">{{ $photos->count() }}</span>
@stop

@section('controls')
	<a href="{{ route('photos.create') }}" class="m-1 btn btn-primary">Upload a photo</a>
@stop

@section('affichage')
<div class="row">
	@foreach ($photos as $photo)
	<div class="col-6 col-md-4 col-lg-3 px-1">
		<div class="card mt-2">
			<a href="{{ asset($photo->path) }}" class="d-block card-img-top"
				style="background-image: url('{{ asset($photo->path) }}'); height: 200px; 
				background-size: cover; background-position: center;"></a>
			<div class="card-block">
				<h4 class="card-title">{{ $photo->caption, 'No title'}}</h4>
			</div>
			<div class="card-footer text-center">
				<a href="{{ route('photos.edit', $photo) }}" class="btn btn-outline-warning">Modify</a>
				<a href="{{ route('photos.destroy', $photo) }}" class="btn btn-outline-danger">Delete</a>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection