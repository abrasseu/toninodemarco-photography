<?php

use Illuminate\Database\Seeder;

class FoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photos = DB::select('SELECT id FROM `photos`');          // TODO : clean this mess

        DB::table('folders')->delete();
        for($i = 1; $i <= 6; ++$i)
        {
            DB::table('folders')->insert([
                    'name'      => "Folder $i",
                    'cover_id'  => $photos[$i]->id,
                    'order'     => $i
            ]);
        }

        $folders = App\Folder::all()->pluck('id')->toArray();
        
        DB::table('portfolio')->delete();
        for($i = 0; $i < 20; ++$i)
        {
            DB::table('portfolio')->insert([
					'folder_id'	=> $folders[array_rand($folders)],
					'photo_id'	=> $photos[$i]->id,
                    'order'     => $i
            ]);
        }
    }
}
