<?php

namespace App\Http\Controllers;

use App\Slide;
use App\Link;
use App\Folder;
use App\Photo;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	/**
	 * Affiche la page d'accueil
	 */
	public function index() {
		$slides = Slide::with('photo')->orderBy('order', 'desc')->get();
		return view('pages.home', compact('slides'));
	}

	/**
	 * Affiche la page à propos
	 */
	public function about() {
		$links = Link::all();
		return view('pages.about', compact('links'));
	}

	/**
	 * Affiche les liens
	 */
	public function links() {
		$links = Link::all();
		return view('pages.links', compact('links'));
	}

	/**
	 * Affiche le portfolio et si l'id est bon, sinon le dossier
	 */
	public function portfolio(int $id = null) {
		if (is_null($id)) {
			// Retourne la vue avec tous les dossiers
			$folders = Folder::hasPhotos()->orderBy('order')->with('photos')->get();
			return view('pages.portfolio', compact('folders'));
		} else {
			// Vérifie si le dossier existe via l'id
			$folder = Folder::findOrFail($id);
			$photos = $folder->photos()->orderBy('order')->paginate(config('view.pagination.public'));

			// Le dossier existe et Contient des photos
			if (!is_null($folder) && !$folder->photos->isEmpty())
				return view('pages.infolder', compact('folder', 'photos'));
			abort(404);
		}
	}

	// Dashboard admin
	public function showAdmin() {
		$this->middleware('auth');

		$photos = Photo::all();
		$folders = Folder::all();
		$slides = Slide::all();
		$links = Link::all();

		return view('admin.panel', compact('photos', 'folders', 'slides', 'links'));
	}

	// Mentions légales
	public function mentionsLegales() {
		return view('pages.mentions-legales');
	}

}
