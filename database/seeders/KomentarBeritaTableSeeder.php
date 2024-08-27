<?php


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class KomentarBeritaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('komentar_beritas')->insert([
            [
            	'id' => 1,
                'id_berita' => 1,
                'nama'      => 'berita id 1',
                'email'   => 'berita1_1@gmail.com',
                'rating'    => 1,
                'komentar' => 'ini komentar berita id 1 ke 1'
            ],
            [
                'id' => 2,
                'id_berita' => 1,
                'nama'      => 'berita id 1 ke 2',
                'email'   => 'berita1_2@gmail.com',
                'rating'    => 1,
                'komentar' => 'ini komentar berita id 1 ke 2'
            ],
            [
                'id' => 3,
                'id_berita' => 2,
                'nama'      => 'berita id 2',
                'email'   => 'berita2@gmail.com',
                'rating'    => 1,
                'komentar' => 'ini komentar berita id 2 ke 1'
            ]
        ]);    
    }
}
