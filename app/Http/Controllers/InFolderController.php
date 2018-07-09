<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Photo;
use App\Http\Requests\InFolderRequest;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;


class InFolderController extends Controller
{

	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the form for adding a photo to the folder.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function add($id) {
		$folder = Folder::findOrFail($id);
		$photos = Photo::notInFolder($id)->get();
		return view('admin.resources.folders.add', compact('folder', 'photos'));
	}

	/**
	 * Show the form for adding a photo to the folder.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function attach(InFolderRequest $request, $folder_id) {
		$folder = Folder::findOrFail($folder_id);
		$photo = Photo::findOrFail($request->input('photo'));
		$folder->photos()->attach($photo);
		return redirect(route('folders.index'))
					->withSuccess("La photo '$photo->caption' a été ajoutée au dossier '$folder->name'.");
	}

	/**
	 * Remove the specified photo from folder.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function detach($folder_id, $photo_id) {
		$oldPhoto = Photo::findOrFail($photo_id)->caption;
		$folder = Folder::findOrFail($folder_id);
		$folder->photos()->detach($photo_id);
		return redirect(route('folders.show', $folder_id))
					->withSuccess("La photo '$oldPhoto' a été détachée du dossier '$folder->name'.");
	}

	public function select($folder_id) {
		$folder = Folder::with('photos')->findOrFail($folder_id);
		$selected = $folder->photos->pluck('id')->toArray();
		$photos = Photo::all()->sortBy('id');
		return view('admin.resources.folders.select', compact('photos', 'folder', 'selected'));
	}

	public function updateAll(Request $request, $folder_id) {
		$folder = Folder::findOrFail($folder_id);
		$folder->photos()->sync(array_slice($request->input(), 1));

		return redirect()->route('folders.show', $folder_id)
					->withSuccess("Les photos du dossier '$folder->name' ont été modifiées.");
	}

	public function updateOrder(OrderRequest $request, $folder_id) {
		$folder = Folder::findOrFail($folder_id);
		foreach ($request->input('orderables') as $order => $id)
			$folder->photos()->where('photo_id', $id)->update(['order' => $order]);

		return redirect()->route('folders.show', $folder_id)
					->withSuccess("L'ordre des photos du dossier '$folder->name' a été modifié.");
	}

}
