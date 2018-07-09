@extends('admin.resources.template')

@section('title')
	Create a link
@stop

@section('affichage')
	<div class="container-fit">
		{{ Form::open(['action' => 'LinksController@store']) }}
			{{ Form::myInput('caption', 'text', 'Caption', 'My link', null, 'autofocus') }}
			{{ Form::myInput('link', 'text', 'Link', 'http://www.website.com') }}

			<div class="form-group text-right">
					<button type="submit" class="btn btn-primary">Create</button>
			</div>
		{{ Form::close() }}
	</div>
@endsection