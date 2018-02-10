<?php

use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
{

    public function run()
    {

        $photos = DB::select('SELECT `id` FROM `photos` LIMIT 10');

        DB::table('slides')->delete();

        for($i = 2; $i < 10; ++$i)
        {
            DB::table('slides')->insert([
                'photo_id'  => $photos[$i]->id,
                'order'     => $i
            ]);
        }


        // factory(App\Slide::class, 5)->create()->each(function ($slide) {
        //     $slide->photo()->save(factory(App\Photo::class)->make());
        // });
    }


}