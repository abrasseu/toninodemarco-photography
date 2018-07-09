@extends('admin.resources.template')

@section('title')
	Edit link {{ $link->id }}
@stop

@section('affichage')
	<div class="container-fit contourd">
		{{ Form::open(['action' => ['LinksController@update', $link]]) }}
			{{ method_field('PUT') }}
			{{ Form::myInput('caption', 'text', 'Caption', 'My link', $link->caption, 'autofocus') }}
			{{ Form::myInput('link', 'text', 'Link', 'http://www.website.com', $link->link) }}
			{{ Form::mySubmit('Update', 'links', $link) }}
		{{ Form::close() }}
	</div>
@endsection