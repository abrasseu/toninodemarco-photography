@extends ('template')

@section('style')
	{{ HTML::style('css/portfolio.css') }}
@endsection

@section('content')
<main>
	<h1 class="text-center mb-4">My Portfolio</h1>
	<div class='d-flex flex-wrap justify-content-center'>
		@foreach($folders as $folder)
		<a	class='folder thumbnails text-white text-center transitions'
			href ='{{ route('portfolio', $folder->id) }}'
			title='Open {{ $folder->name }}'>
			{{-- <div class="img" style="background-image:url('{{asset($folder->cover->path)}}');"></div> --}}
			<img src='{{ asset($folder->cover->path) }}' alt='{{ $folder->name }}'>
			<h2 class='caption'>{{ $folder->name }}</h2>
		</a>
		@endforeach
	</div>
</main>
@endsection
