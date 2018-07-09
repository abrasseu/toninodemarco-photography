@extends('admin.resources.template')

@section('title')
	Edit folder {{ $folder->id }}
@stop

@section('affichage')
<div class="container-fit">
	{{ Form::open(['action' => ['FoldersController@update', $folder]]) }}
		{{ method_field('PUT') }}

		{{ Form::myInput('name', 'text', 'Name', 'My folder', $folder->name, 'autofocus') }}
		{{ Form::myInput('order', 'text', 'Order', 99, $folder->order) }}
		{{ Form::mySelectPhoto('cover', $photos, $folder) }}
		{{ Form::mySubmit('Update', 'folders', $folder) }}
		<div id="preview" class="container"></div>

	{{ Form::close() }}
</div>
@endsection