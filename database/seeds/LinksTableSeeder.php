<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('links')->delete();

		for($i = 1; $i <= 5; ++$i)
		{
			DB::table('links')->insert([
				'link'		=> route("portfolio", ['id' => $i ]),
				'caption'	=> "My portfolio number $i",
                // 'order'     => $i
			]);
		}

    }
}
