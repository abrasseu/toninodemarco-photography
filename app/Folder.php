<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Folder extends Model
{
	protected $fillable = ['name', 'order'];
	public $timestamps = false;

	public function cover() {
		return $this->belongsTo('App\Photo');
	}
	public function photos() {
		return $this->belongsToMany('App\Photo', 'portfolio', 'folder_id', 'photo_id');
	}
	
	public function scopeHasPhotos($query)
	{
		// return $this->photos->isEmpty();
		return $query->whereExists(function ($query) {
			$query->select(\DB::raw(1))
					->from('portfolio')
					->whereRaw('portfolio.folder_id = folders.id');
		});
	}

}
