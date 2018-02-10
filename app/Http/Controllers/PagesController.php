<?php

namespace App\Http\Controllers;

use App\Slide;
use App\Link;
use App\Folder;
use App\Photo;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	// Affiche la page d'accueil
	public function index()
	{
		$slides = Slide::all()->load('photo');
		return view('pages.home', compact('slides'));
	}

	// Affiche la page à propos
	public function about()
	{
		$links = Link::all();
		return view('pages.about', compact('links'));
	}

	// Affiche les liens
	public function links()
	{
		$links = Link::all();
		return view('pages.links', compact('links'));
	}

	// Affiche le portfolio et si l'id est bon, le dossier
	public function portfolio(int $id = null)
	{
		if (is_null($id)) {
			// Retourne la vue avec tous les dossiers
			$folders = Folder::hasPhotos()->get()->load('cover');
			return view('pages.portfolio', compact('folders'));

		} else {
			// Vérifie si le dossier existe via l'id
			$folder = Folder::findOrFail($id);

			if (!is_null($folder) && !$folder->photos->isEmpty()) {
				// Le dossier existe et Contient des photos
				return view('pages.infolder', compact('folder'));
			}
			
			abort(404);
		}
	}

	// Dashboard admin
	public function showAdmin()
	{
		$this->middleware('auth');

		$photos = Photo::all();
		$folders = Folder::all();
		$slides = Slide::all();
		$links = Link::all();

		return view('admin.panel', compact('photos', 'folders', 'slides', 'links'));
	}

	// Mentions légales
	public function mentionsLegales()
	{
		return view('pages.mentions-legales');
	}

/*
	// Hash some meat
	public function hash(Request $request = null) {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			return bcrypt($request->input('meat'));
		}

		$meat = \Faker\Factory::create()->sha256();

		return $meat;
		// return view('hash');
	}
*/

}
