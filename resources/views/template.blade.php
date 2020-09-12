<!DOCTYPE html>
<html lang="en">
<head>
	{{-- META --}}
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tonino De Marco</title>
	<meta name="description" content="Tonino De Marco's photography website. Splendid photographies on the wildlife in Africa and France.">
	<meta name="keywords" content="Tonino, De Marco, photography, photographies, photo, photos, wildlife, animals, Africa, Afrique, France, image">
	<meta name="author" content="Tonino De Marco">
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>
	<link rel="icon" sizes="140x140" href="{{ asset('favicon.jpg') }}">

	{{-- 
		<meta name="name" content="content">
	 --}}

	<!--[if lt IE 9]>
		<script src	="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src	="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	{{-- CSS --}}
	{{ HTML::style('bootstrap/css/bootstrap.min.css') }}
	{{ HTML::style('css/all.min.css') }}
	@yield('style')

	{{-- Anti-copie images --}}
	<script type="text/javascript">
		document.oncontextmenu = function(e) {
			e = e || window.event;
			if (/^img$/i.test((e.target || e.srcElement).nodeName)) return false;
		};
	</script>
	
	{{-- Google Analytics --}}
	<script type="text/javascript">
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-82762441-1', 'auto');
		ga('send', 'pageview');
	</script>
</head>

<body class="grey">
{{-- Header --}}
<nav id="header" class="navbar fixed-top navbar-inverse bg-inverse navbar-toggleable-sm {{ Route::currentRouteName()=='home' ? ' transparent' : 'grey vshadow' }}" role="navigation">
	<div class="container text-center my-auto">

		<div>
			<a href="{{route('home')}}" title="Homepage">
				<img id="logo" src="{{asset('img/logo.png')}}" alt="Tonino De Marco">
			</a>
			<button class="navbar-toggler navbar-toggler-right my-auto" type="button" data-toggle="collapse" data-target="#menu" aria-expanded="false" aria-controls="menu" aria-label="Toggle navigation">
 				<span class="sr-only">Toggle navigation</span>
				<span class="navbar-toggler-icon"></span>
 			</button>
		</div>

		<div id="menu" class="navbar-right navbar-collapse collapse ">		
			<ul class="navbar-nav ml-auto transitions">
				@foreach($routes as $route => $name)
				<li class="nav-item">
					<a href="{{route($route)}}" title="{{ucfirst($route)}}" class="nav-link {{ Route::currentRouteName()==$route ? 'nav-active' : ''}}">{{$name}}</a>
				</li>
				@endforeach
			</ul>
		</div><!--/.nav-collapse -->

	</div>
</nav>


@yield('content')

{{-- Footer --}}
<footer class="footer container text-center text-muted {{ Route::currentRouteName()=='home' ? 'transparent' : 'grey' }}">
	<a href="{{ route('mentions-legales') }}" title="Mentions Légales" class="mx-2 link-footer {{ Route::currentRouteName()=='home' ? ' text-white' : 'text-muted' }}">Mentions légales</a>
	<span class="mx-2 {{ Route::currentRouteName()=='home' ? ' text-white' : 'text-muted' }}">All rights reserved &copy; Tonino De Marco</span>
	{{-- <span class="mx-2 {{ Route::currentRouteName()=='home' ? ' text-white' : 'text-muted' }}">Tous droits réservés Tonino De Marco</span> --}}
</footer>

{{-- Cookies --}}
{{-- 
+ Variable de session knowsCookies bool set on true with js et check 
@if(!session('knowsCookie'))
<div class="pop-cookie container alert alert-warning alert-dismissible fade show m-0" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<span class="align-middle">
		Ce site utilise des cookies
	</span>		
</div>
@endif
 --}}


{{-- SCRIPTS --}}
@section('scripts')
	<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script> --}}
	{{ HTML::script('bootstrap/js/bootstrap.min.js')}}
@show

</body>
</html>