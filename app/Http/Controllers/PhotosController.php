<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Http\Requests\PhotoRequest;
use Illuminate\Http\Request;

class PhotosController extends Controller
{

	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$photos = Photo::all()->sortBy('id');
		return view('admin.resources.photos.index', compact('photos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.resources.photos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(PhotoRequest $request)
	{
		if (\DB::table('photos')->first() == NULL) {
			$lastId = 1;
		} else {
			$lastId = \DB::table('photos')->orderBy('id', 'desc')->first(['id'])->id;			
		}
		$i =0;
		$uploads = [];

		foreach ($request->file()['photo'] as $photo) {
			$lastId++;
			$i++;
			$upload = \Image::make($photo)
							->encode('jpg', 100)
							->save('img/uploads/' . $lastId . '.jpg');

			count($request->file()['photo'])>1 ? $caption = $request->caption . '-' . $i : $caption = $request->caption;

			\DB::table('photos')->insert([
				'path'      => $upload->dirname . '/' . $upload->basename,
				'caption'   => $caption,
			]);

			array_push($uploads, $upload->filename);
		}

		$message = "Les photos " . $request->caption . " (" . implode(', ', $uploads) . ") ont été ajoutées.";
		return redirect(route('photos.index'))->withSuccess($message);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$photo = Photo::findOrFail($id);
		return view('admin.resources.photos.edit', compact('photo'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$photo = Photo::findOrFail($id);
		$photo->caption = $request->input('caption');
		$photo->save();
		return redirect(route('photos.index'))->withSuccess("La photo a été modifiée.");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id, $force = false)
	{
		$photo = Photo::findOrFail($id);
		$usages = $photo->usages();
		// dd(public_path() . DIRECTORY_SEPARATOR  . $photo->path);
		// Empêche la suppression si utilisée
		$force = 'nope';

		if(empty($usages) || $force === 'force')	// On peut supprimer
		{
			$message = "La photo " . $photo->caption . " a été supprimée.";
		
			if ($force === 'force') {
				$message .= " De même, ";

				// Cascade 
				if(in_array('slide', $usages)) {
					$photo->slide->delete();
					$message .= "le slide associé a été supprimé, ";
				}

				if(in_array('cover(s)', $usages)) {
					$message .= "les covers des dossiers ";

					foreach ($photo->covers as $cover) {
						$cover->cover_id = 0;		// TODO : default img
						$cover->save();
						$message .= "'".$cover->name."' (".$cover->id.") ";
					}
					$message .= "ont été enlevées, ";
				}

				if(in_array('folder(s)', $usages)) {
					$message .= "la photo a été supprimée des dossiers ";
					$delFolders = $photo->folders()->detach();
					$message .= $delFolders;
				}
				$message = rtrim($message, ',') . '.';
			}

			$photo->delete();
			unlink(public_path() . DIRECTORY_SEPARATOR . $photo->path);
			return redirect(route('photos.index'))->withSuccess($message);

		} else
		{
			// TODO : clean this mess
			$errorMessage = "La photo " . $photo->caption . " est utilisée en tant que " . implode(', ', $usages) . "."; 
			if($force != 'nope') {
				$errorMessage .= " Voulez-vous <a href='" . route('photos.destroy.force', ['id'=> $photo->id, 'force' => 'force']) . "' class='alert-link'>la supprimer</a> quand même ?";				
			}
			return redirect(route('photos.index'))->withError($errorMessage);
		}
	}
}
