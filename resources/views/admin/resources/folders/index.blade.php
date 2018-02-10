@extends('admin.resources.template')

@section('title')
	All your folders <span class="badge badge-primary">{{ $folders->count() }}</span>
@stop

@section('affichage')

{{-- table-responsive --}}
<table class="table table-bordered table-hover center-table ">
	<col width="100">
	<thead class="thead-inverse ">
		<tr>
			<th>ID / Order</th>
			<th>Name</th>
			<th>Cover</th>
			<th>Controls</th>
		</tr>
	</thead>
	<tbody class="table-sm center-table">

	@foreach ($folders as $folder)
		<tr class="">
			<th rowspan="{{ $folder->photos->count() + 3 }}" scope="row">{{ $folder->id }}</th>
			<td><strong class="text-info">{{ $folder->name }}</strong></td>
			<td><img class="img-fluid thumb" src="{{ asset($folder->cover->path) }}"></td>
			<td>
				<a href="{{ route('folders.select', $folder) }}" class="btn btn-outline-success">Select photos</a>
				<a href="{{ route('folders.edit', $folder) }}" class="btn btn-outline-warning">Modify</a>
				<a href="{{ route('folders.destroy', $folder) }}" class="btn btn-outline-danger">Delete</a>

			</td>
		</tr>

		<tr class="table-active">
			<th colspan="">Order</th>
			<th colspan="">Photo</th>
			<th colspan="">Controls</th>
		</tr>

		@foreach ($folder->photos as $inFolderPhoto)

		<tr class="">
			<th scope="row">{{ $inFolderPhoto->id }}</th>
			<td><img class="img-fluid thumb" src="{{ asset($inFolderPhoto->path) }}"><br>{{ $inFolderPhoto->caption }}</td>
			<td>
				{{-- <a href="{{ route('photos.edit', $photo) }}" class="btn btn-outline-warning">Modify</a> --}}
				<a href="{{ route('folders.detach', [$folder, $inFolderPhoto]) }}" class="btn btn-outline-danger">Detach</a>
			</td>
		</tr>

		@endforeach

		<tr class="folder-delimiter">
			{{-- <td colspan="2">Add a photo in this folder</td> --}}
			<td colspan="3">
				<a href="{{ route('folders.add', $folder) }}" class="btn btn-link btn-block">Add a photo in this folder</a>
			</td>
		</tr>
			
	@endforeach

		<tr class="folder-delimiter">
			<td colspan="4">
				<a href="{{ route('folders.create') }}" class="btn btn-block btn-link">Add a new folder</a>
			</td>
		</tr>

	</tbody>
</table>

@endsection