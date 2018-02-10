<h1 class="titre">Contact me</h1>

{{ Form::open(['action' => 'PagesController@hash']) }}
	{{ Form::text('meat', old('meat') , ['required' => true]) }}	
	{{ Form::submit('Hash it !') }}
{{ Form::close() }}
