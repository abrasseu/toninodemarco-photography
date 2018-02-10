<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Photo;
use App\Http\Requests\InFolderRequest;
use Illuminate\Http\Request;

class InFolderController extends Controller
{

	public function __construct() {
		$this->middleware('auth', ['except' => ['index']]);
	}

	/**
	 * Show the form for adding a photo to the folder.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function add($id)
	{
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
	public function attach(InFolderRequest $request, $folder_id)
	{
		$folder = Folder::findOrFail($folder_id);
		$photo = Photo::findOrFail($request->input('photo'));
		$folder->photos()->attach($photo);
		// die;
		return redirect(route('folders.index'))->withSuccess("La photo '" . $photo->caption . "' a été ajoutée au folder '" . $folder->name . "'.");
	}

	/**
	 * Remove the specified photo from folder.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function detach($folder_id, $photo_id)
	{
		$oldPhoto = Photo::findOrFail($photo_id)->caption;
		$folder = Folder::findOrFail($folder_id);
		$folder->photos()->detach($photo_id);
		return redirect(route('folders.index'))->withSuccess("La photo '" . $oldPhoto . "' a été détachée du folder '" . $folder->name . "'.");
	}

	public function select($folder_id)
	{
		$folder = Folder::findOrFail($folder_id);
		$selected = $folder->photos->pluck('id')->toArray();
		$photos = Photo::all()->sortBy('id');
		return view('admin.resources.folders.select', compact('photos', 'folder', 'selected'));
	}

	public function updateAll(Request $request, $folder_id)
	{
		$folder = Folder::findOrFail($folder_id);
		$folder->photos()->sync(array_slice($request->input(), 1));

		return redirect()->route('folders.index')->withSuccess("Les photos du folder '" . $folder->name . "' ont été modifiées.");

	}

}
