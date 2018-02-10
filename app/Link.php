<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
	protected $fillable = ['link', 'caption'];
	public $timestamps = false;
}
