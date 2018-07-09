<?php

namespace App\Http\Controllers;

use App\Slide;
use App\Photo;
use App\Http\Requests\SlideRequest;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;

class SlidesController extends Controller
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
		$slides = Slide::orderBy('order')->with('photo')->paginate(config('views.pagination.admin'))->withPath('');
		return view('admin.resources.slides.index', compact('slides'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$photos = Photo::noSlides()->get()->sortBy('id');
		return view('admin.resources.slides.create', compact('photos'));
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(SlideRequest $request) {
		$slide = new Slide();
		$slide->photo_id = Photo::findOrFail($request->input('photo'))->id;
		$slide->save();
		return redirect(route('slides.index'))->withSuccess("Le slide a été ajouté.");

	}

	public function select() {
		$slides = Slide::all()->pluck('photo_id')->toArray();
		$photos = Photo::all()->sortBy('id');
		return view('admin.resources.slides.select', compact('photos', 'slides'));
	}

	public function updateAll(Request $request) {
		Slide::truncate();
		foreach (array_slice($request->input(), 1) as $photo => $id) {
			$slide = new Slide();
			$slide->photo_id = Photo::findOrFail($id)->id;
			$slide->save();
		}
		return redirect()->route('slides.select')->withSuccess("Les slides ont été modifiées.");

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		return redirect()->route('slides.index');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		return redirect()->route('slides.select');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		return redirect()->route('slides.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		Slide::destroy($id);
		return redirect()->route('slides.index')->withSuccess("Le slide a été supprimé.");
	}

	public function updateOrder(OrderRequest $request) {
		foreach ($request->input('orderables') as $order => $id)
			Slide::where('id', $id)->update(['order' => $order]);
		return redirect()->route('slides.index')->withSuccess("L'ordre des slides a été modifié.");
	}

}
