<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminConsoleController extends Controller
{

	public function index()
	{
		return view('admin.resources.console.index');
	}

	public function command($command, $force = NULL)
	{
		$allCommands = [
			'up',						// Maintance ON
			'down',						// Maintance OFF
			'optimize',					// Optimize
			'clear-compiled',			// Clear compiled classes
			'view:clear',				// Clear compiled views
			'config:cache',				// Cache config
			'route:cache',				// Cache routes
			'cache:clear',				// Flush cache
			'config:clear',				// Clear config cache
			'route:clear',				// Clear routes cache
			'key:generate',				// Generate the app key
			'auth:clear-resets',		// Flush password resets
			//'',									// Backup databases
			'migrate:refresh',			// Reset databases
		];

		if (in_array($command, $allCommands)) {
			if ($force === 'sure' || $command != 'migrate:refresh') {
				if ($command === 'optimize') {
					$codeConsole = \Artisan::call($command, ['--force' => true]);					
				} else {
					$codeConsole = \Artisan::call($command);					
				}
				
				// Log
				file_put_contents(storage_path("logs/console.log"), "Command '$command' => Code $codeConsole \n", FILE_APPEND);

				if ($codeConsole === 0) {			// Pas d'erreur
					return redirect(route('console.index'))->withSuccess("La commande '$command' a bien été exécutée.");	

				} else {							// Erreur lors de l'exécution de la commande
					return redirect(route('console.index'))->withError("Problème lors de l'exécution de la commande '$command'. (code : $codeConsole)");
				}
			} else {								// Commande protégée
				return redirect(route('console.index'))->withError("Êtes-vous sur de vouloir faire '$command' ? <a href='" . route('console.command', [$command, 'sure']) ."' class='alert-link'>Yes</a>");
			}
		} else {									// Commande non reconnue
			return redirect(route('console.index'))->withError("La commande choisie n'existe pas.");
		}
	}
	
}
