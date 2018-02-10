@extends ('template')

@section('content')
	<main class="container text-center">
		<h1 class="mb-4">Some friends to visit</h1>
		<ul class="list text-left">
			@foreach ($links as $link)
				<li><a class='text-white' target='_blank' title="Have a look at this website" href='{{ $link->link }}'>{{ $link->caption }}</a></li>
			@endforeach
		</ul>
	</main>
@endsection
