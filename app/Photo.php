<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

	protected $fillable = ['path', 'caption', 'order'];
	public $timestamps = false;

	// Relations
	public function slide() {
		return $this->hasOne('App\Slide');
	}
	public function folders() {
		return $this->belongsToMany('App\Folder', 'portfolio', 'photo_id', 'folder_id');
	}
	public function covers() {
		return $this->hasMany('App\Folder', 'cover_id');
	}


	public function scopeNoSlides($query) {
		return $query->whereNotExists(function($query) {
			$query->select(\DB::raw(1))
					->from('slides')
					->whereRaw('slides.photo_id = photos.id');
		});
	}

	public function scopeNotInFolder($query, $folder_id) {							// TODO : Fuuuuuuuuuuuuuuuuuuuuuuu
		return $query->whereNotIn('id', function($query) use ($folder_id) {
			$query->select('photo_id')
					->from('portfolio')
					->where('folder_id', '=', $folder_id);
		});
	}


	/**
	 * Retourne les utilisations de la photo
	 * @return array
	 */
	public function usages() {
		$arr = [];

		$this->slide			 	? array_push($arr, 'slide') : null ;
		$this->covers->isEmpty() 	? null : array_push($arr, 'cover(s)') ;
		$this->folders->isEmpty() 	? null : array_push($arr, 'folder(s)') ;

		return $arr;
	}

}
