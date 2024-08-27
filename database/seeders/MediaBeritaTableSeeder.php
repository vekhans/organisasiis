<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class MediaBeritaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('media_beritas')->insert([
            [
                'id_berita' => 1,
                'jenis'     => 'foto',
                'file'      => 'media/berita/berita1.jpg',
                'caption'   => 'caption foto berita 1',
                'sumber'   => 'sumber foto berita 1 ke 1',
            ],
            [
                'id_berita' => 1,
                'jenis'     => 'foto',
                'file'      => 'media/berita/berita2.jpg',
                'caption'   => 'foto berita 1 ke 2',
                'sumber'   => 'sumber foto berita 1 ke 2',
            ],
            [
                'id_berita' => 2,
                'jenis'     => 'foto',
                'file'      => 'media/berita/berita2.jpg',
                'caption'   => 'foto berita 2',
                'sumber'   => 'sumber foto berita 2',
            ],
            [
                'id_berita' => 2,
                'jenis'     => 'foto',
                'file'      => 'media/berita/berita2_1.jpg',
                'caption'   => 'foto beritaa 2_1',
                'sumber'   => 'sumber foto berita 2',
            ],
            [
                'id_berita' => 2,
                'jenis'     => 'foto',
                'file'      => 'media/berita/berita2_2.jpg',
                'caption'   => 'foto berita 2 dan ini caption.nya',
                'sumber'   => 'sumber foto berita 2 ke 2',
            ],
            [
                'id_berita' => 1,
                'jenis'     => 'foto',
                'file'      => 'media/berita/berita2_3.jpg',
                'caption'   => 'foto berita 1 ke 3',
                'sumber'   => 'sumber foto berita 1 ke 3',
            ],
            [
                'id_berita' => 3,
                'jenis'     => 'foto',
                'file'      => 'media/berita/berita3.jpg',
                'caption'   => 'foto berita 3',
                'sumber'   => 'sumber foto berita 3',
            ],
            [
                'id_berita' => 4,
                'jenis'     => 'foto',
                'file'      => 'media/berita/berita4.jpg',
                'caption'   => 'foto berita 4',
                'sumber'   => 'sumber foto berita 4',
            ],
            [
                'id_berita' => 5,
                'jenis'     => 'foto',
                'file'      => 'media/berita/berita5.jpg',
                'caption'   => 'foto berita 5',
                'sumber'   => 'sumber foto berita 5',
            ],
             
        ]);
    }
}
