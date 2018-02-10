<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Slide extends Model
{

	// protected $fillable = ['order'];
	public $timestamps = false;

	public function photo() {
		return $this->belongsTo('App\Photo');
	}

	protected static function boot() {
		parent::boot();
		static::addGlobalScope('orderAndPhoto', function (Builder $builder) {
			$builder->orderBy('order');//->with('photo');
		});
	}

}
