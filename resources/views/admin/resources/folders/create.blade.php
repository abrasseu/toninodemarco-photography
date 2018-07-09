@extends('admin.resources.template')

@section('title')
	Create a folder
@stop

@section('affichage')
<div class="container-fit">
	{{ Form::open(['action' => 'FoldersController@store']) }}
	
		{{ Form::myInput('name', 'text', 'Name', 'My folder', null, 'autofocus') }}
		{{ Form::mySelectPhoto('cover', $photos) }}
		{{ Form::mySubmit('Create this folder') }}
		<div id="preview" class="container"></div>
		
	{{ Form::close() }}
</div>
@endsection

