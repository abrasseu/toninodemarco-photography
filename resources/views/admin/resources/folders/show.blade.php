@extends('admin.resources.template')

@section('title')
	{{ $folder->name }} <span class="badge badge-primary">{{ $folder->photos->count() }} photos</span>
@stop

@section('controls')
	<a href="{{ route('folders.add', $folder) }}" class="m-1 btn btn-primary">Add a photo</a>
	<a href="{{ route('folders.select', $folder) }}" class="m-1 btn btn-success">Select photos</a>
	<a href="{{ route('folders.edit', $folder) }}" class="m-1 btn btn-warning">Modify folder</a>
	<div class="m-1 d-inline-block">
		{{ Form::open(['action' => ['InFolderController@updateOrder', $folder]]) }}
			{{ method_field('PUT') }}
			<div id="order-inputs" class="d-none"></div>
			<input id="order-btn" class="btn btn-primary" disabled="true" type="submit" value="Update order">
		{{ Form::close() }}	
	</div>
@stop

@section('affichage')
<div id="orderable" class="row">
	@foreach ($folder->photos as $photo)
	<div class="col-6 col-md-4 col-lg-3 px-1" data-id="{{ $photo->id }}">
		<div class="card mt-2">
			<div class="card-img-top" style="background-image: url('{{ asset($photo->path) }}'); height: 200px; 
				background-size: cover; background-position: center;"></div>
			<div class="card-block">
				<h4 class="card-title">{{ $photo->caption, 'No name'}}</h4>
			</div>
			<div class="card-footer text-center">
				<a href="{{ route('folders.detach', [$folder, $photo]) }}" class="btn btn-outline-danger">Detach</a>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endsection


@section('scripts')
	@parent
	{{ HTML::script('js/Sortable.js') }}
	{{ HTML::script('js/updateOrder.js') }}
@endsection
