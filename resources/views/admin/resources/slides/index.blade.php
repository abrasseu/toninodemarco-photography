@extends('admin.resources.template')

@section('title')
	All your slides <span class="badge badge-primary">{{ $slides->total() }}</span>
@stop

@section('controls')
	<a href="{{ route('slides.select') }}" class="m-1 btn btn-success">Select all</a>
	<a href="{{ route('slides.create') }}" class="m-1 btn btn-primary">Add a slide</a>
	<div class="m-1 d-inline-block">
		{{ Form::open(['action' => 'SlidesController@updateOrder']) }}
			{{-- {{ method_field('PUT') }} --}}
			<div id="order-inputs" class="d-none"></div>
			<input id="order-btn" class="btn btn-primary" disabled="true" type="submit" value="Update order">
		{{ Form::close() }}	
	</div>
@stop

@section('affichage')
	<div id="orderable" class="row">
		@foreach ($slides->items() as $slide)
		<div class="col-6 col-md-4 col-lg-3 px-1" data-id="{{ $slide->id }}">
			<div class="card mt-2 shadow">
				<div class="card-img-top" style="background-image: url('{{ asset($slide->photo->path) }}'); height: 200px; 
					background-size: cover; background-position: center;"></div>
				<div class="card-block">
					<h4 class="card-title mb-0">{{ $slide->photo->caption, 'No title'}}</h4>
				</div>
				<div class="card-footer text-center">
					<a href="{{ route('slides.edit', $slide) }}" class="btn btn-outline-warning">Modify</a>
					<a href="{{ route('slides.destroy', $slide) }}" class="btn btn-outline-danger">Delete</a>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<div class="col-12 my-3">
		{{ $slides }}
	</div>
@stop

@section('scripts')
	@parent
	{{ HTML::script('js/Sortable.js') }}
	{{ HTML::script('js/updateOrder.js') }}
@endsection

