@extends('admin.resources.template')

@section('title')
	All your links <span class="badge badge-primary">{{ $links->count() }}</span>
@stop

@section('controls')
	<a id="addLink" href="{{ route('links.create') }}" class="m-1 btn btn-primary">Add a new link</a>
@stop


@section('affichage')
<div class="table-responsive">
	<table class="table table-bordered table-hover center-table">
		<col width="100">
		<thead class="thead-inverse ">
			<tr>
				<th>ID / Order</th>
				<th>Caption</th>
				<th>Link</th>
				<th>Controls</th>
			</tr>
		</thead>

		<tbody class="table-sm">
			@foreach ($links as $link)
			<tr class="">
				<th scope="row">{{ $link->id }}</th>
				<td>{{ $link->caption }}</td>
				<td><a href="{{ $link->link }}">{{ $link->link }}</a></td>
				<td>
					<a href="{{ route('links.edit', 	$link) }}" class="btn btn-outline-warning">Modify</a>
					<a href="{{ route('links.destroy', 	$link) }}" class="btn btn-outline-danger">Delete</a>
				</td>
			</tr>
			@endforeach

			<tr class="">
				<td colspan="4">
					<a id="addLink" href="{{ route('links.create') }}" class="btn btn-link btn-block">Add a new link</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>

@endsection