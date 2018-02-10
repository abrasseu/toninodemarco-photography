@extends('admin.template')

@section('content')

<div class="jumbotron">
	<h1>Dashboard</h1>
	<p>Welcome to the admin panel !</p>
	<hr class="m-y-md">
	<div class="row">

		<div class="col-md-6 col-lg-4">
			<p>Here is some information :</p>
			<ul>
				<li>You have uploaded <strong class="text-info">{{ $photos->count() }} photos</strong></li>
				<li>You have created <strong class="text-info">{{ $folders->count() }} folders</strong></li>
				<li>You have selected <strong class="text-info">{{ $slides->count() }} slides</strong></li>
				<li>You have put forward <strong class="text-info">{{ $links->count() }} links</strong></li>
			</ul>
		</div>

		<div class="col-md-6 col-lg-4">
			<p>Some more :</p>
			<ul>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>

		<div class="col-md-6 mx-md-auto col-lg-4">
			<p>I said MOAR :</p>
			<ul>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>

	</div>
</div>

@stop