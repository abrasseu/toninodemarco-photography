@extends('admin.template')

@section('content')
	@yield('form')
	<div class="mt-2 mb-3 container-fluid d-flex flex-wrap justify-content-around align-content-center">
		<h1 class="text-center mt-3 mb-3">
			@yield('title')
		</h1>
		@if (!empty($__env->yieldContent('controls')))
			<div class="d-flex justify-content-center align-items-center">
				@yield('controls')
			</div>
		@endif
	</div>

	@yield('affichage')
@endsection