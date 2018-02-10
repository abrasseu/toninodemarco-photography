@extends('admin.resources.template')

@section('title')
	Add a photo to the folder '{{ $folder->name }}'
@stop

@section('affichage')

<div class="container-fit">
	{{ Form::open(['action' => ['InFolderController@attach', $folder]]) }}
		{{ method_field('PUT') }}

		{{ Form::mySelectPhoto('photo', $photos) }}
		{{ Form::mySubmit('Add this photo to the folder') }}
		<div id="preview" class="container"></div>

	{{ Form::close() }}
</div>
	
@endsection