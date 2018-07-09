<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Photo;
use App\Http\Requests\FolderRequest;
use App\Http\Requests\OrderRequest;

class FoldersController extends Controller
{

	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$folders = Folder::orderBy('order')->with('cover', 'photos')->paginate(config('view.pagination.admin'))->withPath('');
		return view('admin.resources.folders.index', compact('folders'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$photos = Photo::all();
		return view('admin.resources.folders.create', compact('photos'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(FolderRequest $request) {
		$folder = new Folder();
		$folder->name = $request->input('name');
		$folder->cover_id = Photo::findOrFail($request->input('cover'))->id;
		$folder->save();
		return redirect(route('folders.index'))->withSuccess("Le dossier '" . $folder->name ."' a été ajouté.");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$folder = Folder::with(['photos' => function($query) {
			$query->orderBy('order');
		}])->findOrFail($id);
		return view('admin.resources.folders.show', compact('folder'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$photos = Photo::all();
		$folder = Folder::findOrFail($id);
		return view('admin.resources.folders.edit', compact('folder', 'photos'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(FolderRequest $request, $id) {
		$folder = Folder::findOrFail($id);
		$folder->name = $request->input('name');
		$folder->cover_id = Photo::findOrFail($request->input('cover'))->id;
		$folder->order = $request->input('order');
		$folder->save();
		return redirect(route('folders.index'))->with("success", "Le dossier " . $folder->name . " a mis à jour.");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$oldFolder = Folder::findOrFail($id)->name;
		Folder::destroy($id);
		return redirect(route('folders.index'))->withSuccess("Le dossier " . $oldFolder . " a été supprimé.");
	}


	public function updateOrder(OrderRequest $request) {
		foreach ($request->input('orderables') as $order => $id)
			Folder::where('id', $id)->update(['order' => $order]);
		return redirect()->route('folders.index')->withSuccess("L'ordre des dossiers a été modifié.");
	}

}
