@extends('template')

@section('content')

	<!--	Slide auto en fond	-->
	<main>
		<section id="welcome" class="container text-right">
			{{-- <div class="d-table-cell align-middle"> --}}
				<h1 class="mb-0">Welcome</h1>
				<a class="lead text-white" href="{{route('portfolio')}}">Explore the portfolio &rarr;</a>
			{{-- </div> --}}
		</section>

		<section id="slideshow">
		@foreach ($slides as $slide)
			{{-- {{ HTML::image($slide->photo->path, null, ['class' => 'slides']) }} --}}
			<div class="slides" style="background-image:url('{{asset($slide->photo->path)}}');"></div>
			{{-- <img class='slides' alt="{{ $slide->photo->caption }}" src='{{ asset($slide->photo->path) }}'> --}}
		@endforeach
		</section>
	</main>

@endsection

@section('scripts')
	@parent

	<!-- Script de fondu cyclique -->
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script defer>
		function cycle(){
			$('#slideshow :last').animate({opacity:0}, 1000, function() {
				$(this).prependTo('#slideshow').css({opacity:1});
			});
		}
		window.setInterval(cycle, 4000);
	</script>
@endsection