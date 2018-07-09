@extends('admin.resources.template')

@section('title')
	All your folders <span class="badge badge-primary">{{ $folders->total() }}</span>
@stop


@section('controls')
	<a href="{{ route('folders.create') }}" class="m-1 btn btn-primary">Create a folder</a>
	<div class="m-1 d-inline-block">
		{{ Form::open(['action' => 'FoldersController@updateOrder']) }}
			{{-- {{ method_field('PUT') }} --}}
			<div id="order-inputs" class="d-none"></div>
			<input id="order-btn" class="btn btn-secondary" disabled="true" type="submit" value="Update order">
		{{ Form::close() }}	
	</div>
@stop

@section('affichage')
<div id="orderable" class="row">
	@foreach ($folders->items() as $folder)
	<div class="col-6 col-md-4 col-lg-3 px-1" data-id="{{ $folder->id }}">
		<div class="card mt-2">
			<div class="card-img-top" style="background-image: url('{{ asset($folder->cover->path) }}'); height: 200px; 
				background-size: cover; background-position: center;"></div>
			<div class="card-block">
				<h4 class="card-title">{{ $folder->name, 'No name'}}</h4>
			</div>
			<div class="card-footer text-center">
				<a href="{{ route('folders.show', $folder) }}" class="mb-1 btn btn-primary">Open</a>
				<a href="{{ route('folders.select', $folder) }}" class="mb-1 btn btn-outline-success">Select photos</a>
				<br>
				<a href="{{ route('folders.edit', $folder) }}" class="mb-1 btn btn-outline-warning">Modify</a>
				<a href="{{ route('folders.destroy', $folder) }}" class="mb-1 btn btn-outline-danger">Delete</a>
			</div>
		</div>
	</div>
	@endforeach
	<div class="col-12 my-3">
		{{ $folders }}
	</div>
</div>
@endsection


@section('scripts')
	@parent
	{{ HTML::script('js/Sortable.js') }}
	{{ HTML::script('js/updateOrder.js') }}
@endsection
