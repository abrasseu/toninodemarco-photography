@extends('admin.resources.template')

@section('title')
	Add a slide
@stop

@section('affichage')
<div class="container-fit">
	{{ Form::open(['action' => 'SlidesController@store']) }}

		{{ Form::mySelectPhoto('photo', $photos) }}
		{{ Form::mySubmit('Add this slide') }}
		<div id="preview" class="container"></div>

	{{ Form::close() }}
</div>
@stop