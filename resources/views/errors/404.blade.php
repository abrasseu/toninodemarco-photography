@extends('template')

@section('content')
<div class="container contour text-center">
	<h1>Sorry ! Page not found...</h1>
	<p class="text--center">Find your way <a href="{{ route('home') }}" title="Homepage" class="lien-apparent">home</a> !</p>
</div>

@stop