<?php

namespace App\Http\Controllers;

use App\Link;
use App\Http\Requests\LinkRequest;

class LinksController extends Controller
{

	public function __construct() {
		$this->middleware('auth', ['except' => ['index']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$links = Link::all()->sortBy('id');
		return view('admin.resources.links.index', compact('links'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.resources.links.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(LinkRequest $request)
	{
		$link = Link::firstOrCreate([
			'caption' 	=> $request->caption,
			'link' 		=> $request->link,
		]);

		return redirect(route('links.index'))->withSuccess("Le lien " . $link->caption . " a été créé.");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$link = Link::findOrFail($id)->link;
		return redirect($link);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$link = Link::findOrFail($id);
		return view('admin.resources.links.edit', compact('link'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(LinkRequest $request, $id)
	{
		$link = Link::findOrFail($id);
		$link->update($request->all());
		return redirect(route('links.index'))->with("success", "Le lien " . $link->caption . " a mis à jour.");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$oldLink = Link::findOrFail($id)->caption;
		Link::destroy($id);
		return redirect(route('links.index'))->withSuccess("Le lien " . $oldLink . " a été supprimé.");
	}
}
