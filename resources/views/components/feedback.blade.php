@if(session()->has('success') || session()->has('error'))
<div class="container">

	@if (session()->has('success'))
		<div class="alert alert-success shadow" role="alert">
			<strong>Success !</strong> {{ session('success') }}
		</div>
	@endif

	@if (session()->has('error'))
		<div class="alert alert-danger shadow" role="alert">
			<strong>Warning !</strong> {!! session('error') !!}
		</div>
	@endif

</div>
@endif