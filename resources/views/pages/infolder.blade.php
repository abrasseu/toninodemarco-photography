@extends ('template')

@section('style')
	@parent
	{{-- {{ HTML::style('css/portfolio.css') }} --}}
	{{ HTML::style('lightGallery/css/lightgallery.min.css') }}
@endsection

@section('content')
<main>
	<div class="container mb-4">
		<a class="float-left back-arrow" href="{{ route('portfolio') }}" title="Back to the portfolio">&larr;</a>
		<h1 class="text-center">{{ $folder->name }}</h1>
	</div>

	{{-- TODO : +folder title +bouton retour folders --}}
	<div id='lightgallery' class='d-flex flex-wrap justify-content-center'>
		@foreach ($folder->photos as $thumbnail)
				<a class='thumbnails photo transitions'
					title='{{ $thumbnail->caption }}'				
					href ='{{ asset($thumbnail->path) }}'
				>
					<img src='{{ asset($thumbnail->path) }}' alt='{{ $thumbnail->caption }}'>
					<div class="mask d-flex align-items-center justify-content-center text-white font-weight-bold display-1"></div>
				</a>
		@endforeach
	</div>
</main>
@endsection

@section('scripts')
	@parent
	{{-- lightGallery --}}
	{{ HTML::script('lightGallery/js/lightgallery.min.js') }}
	{{ HTML::script('lightGallery/js/lg-hash.min.js') }}
	{{ HTML::script('lightGallery/js/lg-autoplay.min.js') }}
	<script type="text/javascript">
		$(document).ready(function() {
			$("#lightgallery").lightGallery({
				download: false
			}); 
		});
	</script>
@endsection
