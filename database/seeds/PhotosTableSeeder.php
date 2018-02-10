<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('photos')->delete();

		for($i = 1; $i <= 20; ++$i)
		{
			DB::table('photos')->insert([
				'path'      => "img/HD/$i.jpg",
				'caption'   => "Photo $i",
			]);
		}

	}
}
