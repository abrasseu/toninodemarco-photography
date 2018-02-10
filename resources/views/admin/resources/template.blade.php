@extends('admin.template')

@section('content')

@yield('form')
<div class="row mb-md-4">
	<div class="col-12">
		<h1 class="text-center mt-4 mb-4">
			@yield('title')
		</h1>
	</div>
	{{-- Controls --}}
	{{-- TODO hidden si pas de controls -> section puis component ? --}}
	<div class="hidden-sm-down col-12 text-right absolute">
		<div class="btn-group-vertical" role="group" aria-label="Controls">
			@yield('controls')
		</div>
	</div>
</div>

{{-- Mobile Controls --}}
<div class="text-center mb-4 hidden-md-up">
	@yield('controls')
</div>

@yield('affichage')

@endsection