<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Donne les routes et leur nom lisible à toutes les vues
		$routes = config('view.routes');
		$adminRoutes = config('view.adminRoutes');
		view()->share(compact('routes', 'adminRoutes'));

		// Components Form
		\Form::component('myInput', 'components.input', ['name', 'type', 'label' => 'Label', 'placeholder' => null, 'value' => false, 'options' => null]);
		\Form::component('mySubmit', 'components.submit', ['text', 'modelName' => null, 'model' => null]);
		\Form::component('mySelectPhoto', 'components.selectPhoto', ['name', 'photos', 'model' => null]);

	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}
}
