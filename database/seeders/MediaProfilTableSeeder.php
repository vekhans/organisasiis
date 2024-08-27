<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class MediaProfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('media_profils')->insert([
            [
                'id_profil' => 1,
                'id_ad'     => 1,
                'jenis'     => 'foto',
                'file'      => 'media/profil/profil1.jpg',
                'caption'   => 'ini caption foto profil 1',
                'sumber'   => 'sumber foto profil 1',
            ],
            [
                'id_profil' => 1,
                'id_ad'     => 2,
                'jenis'     => 'foto',
                'file'      => 'media/slide/slider1.jpg',
                'caption'   => 'foto profil 2',
                'sumber'   => 'sumber foto profil 2',
            ],
        ]);
    }
}
