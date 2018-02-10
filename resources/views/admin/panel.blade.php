@extends('admin.template')

@section('content')

<div class="jumbotron shadow">
	<h1>Dashboard</h1>
	<p>Welcome to the admin panel !</p>
	<hr class="m-y-md">
	<div class="row">

		<div class="col-md-6">
			<p>Here is some information :</p>
			<ul>
				<li>You have uploaded <strong class="font-weight-bold">{{ $photos->count() }} photos</strong></li>
				<li>You have created <strong class="font-weight-bold">{{ $folders->count() }} folders</strong></li>
				<li>You have selected <strong class="font-weight-bold">{{ $slides->count() }} slides</strong></li>
				<li>You have put forward <strong class="font-weight-bold">{{ $links->count() }} links</strong></li>
			</ul>
		</div>

		<div class="col-md-6">
			<p>Manage the website :</p>
			<ul>
				<li><a href="https://www.google.com/analytics/">Google Analytics</a></li>
				<li><a href="ovh.com/manager/web/index.html#/configuration">OVH</a></li>
			</ul>
		</div>

	</div>
</div>

{{-- .... --}}

@endsection

@section('archive')
<div id="accordion" class="shadow" role="tablist" aria-multiselectable="true">

	{{-- LINKS --}}
	<div class="card">
		<div class="card-header" role="tab" id="tabLinks">
			<h2 class="text-center mb-0 dropdown-toggle">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseLinks" aria-expanded="true" aria-controls="collapseLinks">
					All your links</a> 
					<span class="badge badge-primary">{{ $links->count() }}</span>
			</h2>
		</div>

		<div id="collapseLinks" class="collapse" role="tabpanel" aria-labelledby="tabLinks">
			<div class="card-block">
				<div class="row">
					<table class="table table-bordered table-hover center-table ">
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
								<td>{{ $link->link }}</td>
								<td>
									<button type="button" class="btn btn-outline-warning">Modify</button>
									<button type="button" class="btn btn-outline-danger">Delete</button>
								</td>
							</tr>
							@endforeach
							<tr class="">
								<td colspan="3">Add a new link</td>
								<td><button id="addLink" type="button" class="btn btn-outline-primary">Add</button></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	{{-- PHOTOS --}}
	<div class="card">
		<div class="card-header" role="tab" id="tabPhotos">
			<h2 class="text-center mb-0 dropdown-toggle">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapsePhotos" aria-expanded="true" aria-controls="collapsePhotos">
					All your photos</a> 
					<span class="badge badge-primary">{{ $photos->count() }}</span>
			</h2>
		</div>

		<div id="collapsePhotos" class="collapse" role="tabpanel" aria-labelledby="tabPhotos">
			<div class="card-block">
				<div class="row">
				@foreach ($photos as $photo)
					<div class="col-sm-6 col-md-4 col-lg-3">
						{{-- <img src="{{ asset($photo->path) }}" class="img-responsive"> --}}

						<div class="card mt-2">
							<img class="card-img-top img-fluid" src="{{ asset($photo->path) }}">
							<div class="card-block">
								<h4 class="card-title">{{ $photo->caption, 'No title'}}</h4>
							</div>
						</div>
					</div>
					@endforeach
					<div class="col-sm-6 col-md-4 col-lg-3">	
						<div class="card mt-2">
							{{-- <img class="card-img-top img-fluid" src="{{ asset('img/plus.png') }}"> --}}
							<div class="card-block">
								<h4 class="card-title">Add a new photo</h4>
								<a href="#" class="btn btn-primary btn-block">Upload it !</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	{{-- FOLDERS --}}
	<div class="card">
		<div class="card-header" role="tab" id="tabFolders">
			<h2 class="text-center mb-0 dropdown-toggle">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseFolders" aria-expanded="true" aria-controls="collapseFolders">
					All your folders</a>
					<span class="badge badge-primary">{{ $folders->count() }}</span>
			</h2>
		</div>

		<div id="collapseFolders" class="collapse" role="tabpanel" aria-labelledby="tabFolders">
			<div class="card-block">

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
							<td>{{ $folder->name }}</td>
							<td><img class="img-fluid thumb" src="{{ asset($folder->cover->path) }}"></td>
							<td>
								<button type="button" class="btn btn-outline-warning">Modify</button>
								<button type="button" class="btn btn-outline-danger">Delete</button>
							</td>
						</tr>

						<tr class="table-active">
							<th colspan="">Order</th>
							<th colspan="">Image</th>
							<th colspan="">Controls</th>
						</tr>

						@foreach ($folder->photos as $inFolderPhoto)

						<tr class="">
							<th scope="row">{{ $inFolderPhoto->id }}</th>
							<td><img class="img-fluid thumb" src="{{ asset($inFolderPhoto->path) }}"><br>{{ $inFolderPhoto->caption }}</td>
							<td>
								<button type="button" class="btn btn-outline-warning">Modify</button>
								<button type="button" class="btn btn-outline-danger">Delete</button>
							</td>
						</tr>

						@endforeach

						<tr class="">
							<td colspan="2">Add a photo in this folder</td>
							<td><button type="button" class="btn btn-outline-primary">Add</button></td>
						</tr>
							
					@endforeach

						<tr class="">
							<td colspan="3">Add a new folder</td>
							<td><button type="button" class="btn btn-outline-primary">Add</button></td>
						</tr>

					</tbody>
				</table>

			</div>
		</div>
	</div>
	
	{{-- SLIDES --}}
	<div class="card">
		<div class="card-header" role="tab" id="tabSlides">
			<h2 class="text-center mb-0 dropdown-toggle">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseSlides" aria-expanded="true" aria-controls="collapseSlides">
					All your slides</a> 
					<span class="badge badge-primary">{{ $slides->count() }}</span>
			</h2>
		</div>

		<div id="collapseSlides" class="collapse" role="tabpanel" aria-labelledby="tabSlides">
			<div class="card-block">
				<div class="row">
					@foreach ($slides as $slide)
					<div class="col-sm-6 col-md-4 col-lg-3">
						{{-- <img src="{{ $photo->path }}" class="img-responsive"> --}}

						<div class="card mt-2">
							<img class="card-img-top img-fluid" src="{{ asset($slide->photo->path) }}">
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
					<div class="col-sm-6 col-md-4 col-lg-3">	
						<div class="card mt-2">
							{{-- <img class="card-img-top img-fluid" src="{{ asset('img/plus.png') }}"> --}}
							<div class="card-block">
								<h4 class="card-title">Add a new photo</h4>
								<a href="#" class="btn btn-primary btn-block">Upload it !</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop