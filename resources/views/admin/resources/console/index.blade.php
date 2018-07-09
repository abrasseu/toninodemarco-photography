@extends('admin.resources.template')
{{-- 
@section('title')
	Admin Artisan Console
@stop
 --}}

{{-- 
@section('controls')
	<a href="{{ route('slides.select') }}" class="btn btn-lg btn-success">Select all</a>
	<a href="{{ route('slides.create') }}" class="btn btn-lg btn-primary">Add a slide</a>
@stop
 --}}


@section('affichage')

<div class="jumbotron">
	<h1 class="display-3">Admin Artisan Console</h1>
	<hr class="m-y-md">
	<p class="lead">Attention cette partie est technique, ne pas faire n'importe quoi !</p>
</div>

<div class="bg-faded p-4">

	<table class="table table-responsive">
	<tbody class="center-block">	{{-- FIXME Centrer le tableau --}}
		<tr>
			<th class="lead align-middle text-right" scope="row">Maintenance</th>
			<td>
				<a class="my-1 btn btn-primary" 		href="{{ route('console.command', 'up') }}" role="button">Off / Up</a>
				<a class="my-1 btn btn-outline-warning" href="{{ route('console.command', 'down') }}" role="button">On / Down</a>
			</td>
		</tr>
		<tr>
			<th class="lead align-middle text-right" scope="row">Performance</th>
			<td>
				<a class="my-1 btn btn-success" 		href="{{ route('console.command', 'optimize') }}" role="button">Optimize</a>
				<a class="my-1 btn btn-outline-info" 	href="{{ route('console.command', 'clear-compiled') }}" role="button">Clear compiled classes</a>
				<a class="my-1 btn btn-outline-info" 	href="{{ route('console.command', 'view:clear') }}" role="button">Clear compiled views</a>
			</td>
		</tr>
		<tr>
			<th class="lead align-middle text-right" scope="row">Cache</th>
			<td>
				<a class="my-1 btn btn-outline-info" 	href="{{ route('console.command', 'config:cache') }}" role="button">Cache config</a>
				<a class="my-1 btn btn-outline-info" 	href="{{ route('console.command', 'route:cache') }}" role="button">Cache routes</a>
				<a class="my-1 btn btn-outline-warning" href="{{ route('console.command', 'cache:clear') }}" role="button">Flush the cache</a>
				<a class="my-1 btn btn-outline-warning" href="{{ route('console.command', 'config:clear') }}" role="button">Clear config cache</a>
				<a class="my-1 btn btn-outline-warning" href="{{ route('console.command', 'route:clear') }}" role="button">Clear routes cache</a>
			</td>
		</tr>
		<tr>
			<th class="lead align-middle text-right" scope="row">Security</th>
			<td>
				<a class="my-1 btn btn-primary" 		href="{{ route('console.command', 'key:generate') }}" role="button">Generate the application key</a>
				<a class="my-1 btn btn-outline-info" 	href="{{ route('console.command', 'auth:clear-resets') }}" role="button">Flush password resets</a>
			</td>
		</tr>
		<tr>
			<th class="lead align-middle text-right" scope="row">Databases</th>
			<td>
				<a class="my-1 btn btn-primary" 		href="{{ route('console.command', '') }}" role="button">Backup</a>
				<a class="my-1 btn btn-danger" 			href="{{ route('console.command', 'migrate:refresh') }}" role="button">Reset databases</a>
			</td>
		</tr>
	</tbody>
	</table>





	{{-- 

	<br><br><br>
	<h2 class="ml-md-5 my-3">Caches</h2>
	<div>
		
		<div class="card col-4">
			<div class="card-block py-3 px-0">
				<h2 class="card-title text-center">Views</h2>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<a class="btn btn-block btn-outline-primary" href="#" role="button">Cache views</a>
					</li>
					<li class="list-group-item">
						<a class="btn btn-block btn-outline-danger" href="#" role="button">Clear cache</a>
					</li>
				</ul>
			</div>
		</div>



	</div>
	--}}
</div>
@stop


{{-- 
		<div class="row">
			<div class="col-4 bg-faded rounded p-3">
				<h2 class="text-center mb-4">Views</h2>
				<div class="text-center">
					<a class="btn btn-primary m-auto" href="#" role="button">Do stuff</a>					
					<a class="btn btn-primary m-auto" href="#" role="button">Do stuff</a>					
				</div>
			</div>
			...
		</div>
 --}}



{{--
Available commands:
  clear-compiled       Remove the compiled class file
  down                 Put the application into maintenance mode
  env                  Display the current framework environment
  help                 Displays help for a command
  inspire              Display an inspiring quote
  list                 Lists commands
  migrate              Run the database migrations
  optimize             Optimize the framework for better performance
  serve                Serve the application on the PHP development server
  tinker               Interact with your application
  up                   Bring the application out of maintenance mode
 app
  app:name             Set the application namespace
 auth
  auth:clear-resets    Flush expired password reset tokens
 cache
  cache:clear          Flush the application cache
  cache:forget         Remove an item from the cache
  cache:table          Create a migration for the cache database table
 config
  config:cache         Create a cache file for faster configuration loading
  config:clear         Remove the configuration cache file
 db
  db:seed              Seed the database with records
 debugbar
  debugbar:clear       Clear the Debugbar Storage
 event
  event:generate       Generate the missing events and listeners based on registration
 key
  key:generate         Set the application key
 migrate
  migrate:install      Create the migration repository
  migrate:refresh      Reset and re-run all migrations
  migrate:reset        Rollback all database migrations
  migrate:rollback     Rollback the last database migration
  migrate:status       Show the status of each migration
 notifications
  notifications:table  Create a migration for the notifications table
 queue
  queue:failed         List all of the failed queue jobs
  queue:failed-table   Create a migration for the failed queue jobs database table
  queue:flush          Flush all of the failed queue jobs
  queue:forget         Delete a failed queue job
  queue:listen         Listen to a given queue
  queue:restart        Restart queue worker daemons after their current job
  queue:retry          Retry a failed queue job
  queue:table          Create a migration for the queue jobs database table
  queue:work           Start processing jobs on the queue as a daemon
 route
  route:cache          Create a route cache file for faster route registration
  route:clear          Remove the route cache file
  route:list           List all registered routes
 schedule
  schedule:run         Run the scheduled commands
 session
  session:table        Create a migration for the session database table
 storage
  storage:link         Create a symbolic link from "public/storage" to "storage/app/public"
 vendor
  vendor:publish       Publish any publishable assets from vendor packages
 view
  view:clear           Clear all compiled view files

   --}}