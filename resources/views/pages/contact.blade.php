@extends('template')

@section('content')
<main class="container">
	<div class="row justify-content-center">		
		{{-- Social --}}
		<div class="col-12 col-sm-8 col-md-4 mb-4 mb-md-0">
		<div class="contour rounded">
			<h1 class="mb-3">Follow me</h1>
			<ul class="list w-100">
				<li>
					<a target="_blank" href="http://www.biosphoto.com/photographe.php?id=1082" title="Biosphoto agency"><strong class="font-weight-bold">Biosphoto</strong> : photo agency</a>
				</li>
				<li>
					<a target="_blank" href="https://www.instagram.com/toninodemarcophoto/" title="Instagram Tonino De Marco">
						<strong class="font-weight-bold align-middle">Instagram</strong>
					</a>
				</li>
				<li>
					<a class="d-inline-block" target="_blank" href="https://www.facebook.com/people/Tonino-De-Marco/100012345489234" title="Facebook Tonino De Marco">
						<strong class="font-weight-bold align-middle">Facebook</strong>
					</a>
					<iframe class="float-right" src="https://www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Fpeople%2FTonino-De-Marco%2F100012345489234&width=100&height=65&layout=button&size=large&show_faces=true&appId" width="100" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
				</li>
				<li>
				</li>
			</ul>
		</div>
		</div>
		
		{{-- Contact --}}
		
		<div class="col-12 col-md-8 col-lg-8">
		<div class="contour rounded">
			<h1 class="mb-3">Contact me</h1>
			<p class="lead">My mail : <a href="mailto:wildlifetonino@gmail.com?subject=website">wildlifetonino@gmail.com</a></p>
			{{-- 
			@if(session('fbContact'))
				<div class="alert alert-success" role="alert">
					<span class="font-weight-bold">Success !</span> {{ session('fbContact') }}
				</div>
			@endif
			<div>
				{{ Form::open(['action' => 'ContactController@postMessage']) }}			
					{{ Form::myInput('name', 'text', 'Your name', 'John Doe', null, 'autofocus required') }}
					{{ Form::myInput('email', 'email', 'Your email', 'email@mail.com', null, 'required') }}
					{{ Form::myInput('texte', 'textarea', 'Your message', 'Hello !', null, 'required') }}
					{{ Form::mySubmit('Send') }}
				{{ Form::close() }}
			</div>
			 --}}
		
		</div>
		</div>

	</div>
</main>
@endsection


