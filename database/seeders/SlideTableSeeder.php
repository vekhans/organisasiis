<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SlideTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slides')->insert([
            [
                'id_admin'     => 1,
                'file'      => 'media/slide/slider2.jpg',
                'caption'   => 'ini caption foto slide dem',
                'sumber'   => 'sumber foto dem  1',
                'sumber'   => 'sumber foto dem  1',
                'status' => 1,
            ],
            [
                'id_admin'     => 2,
                'file'      => 'media/slide/slider1.jpg',
                'caption'   => 'ini caption foto slide 1',
                'sumber'   => 'sumber foto slider1',
                'status' => 1,
            ],
            [
                'id_admin'     => 3,
                'file'      => 'media/slide/slider2.jpg',
                'caption'   => 'ini caption foto slide 2',
                'sumber'   => 'sumber foto slider2',
                'status' => 1,
            ],
            [
                'id_admin'     => 1,
                'file'      => 'media/slide/slider3.jpg',
                'caption'   => 'ini caption foto slide 3',
                'sumber'   => 'sumber foto slider3',
                'status' => 1,
            ],
            [
                'id_admin'     => 2,
                'file'      => 'media/slide/slider4.jpg',
                'caption'   => 'ini caption foto slide 4',
                'sumber'   => 'sumber foto slider4',
                'status' => 1,
            ],
            [
                'id_admin'     => 2,
                'file'      => 'media/slide/slider5.jpg',
                'caption'   => 'ini caption foto slide 5',
                'sumber'   => 'sumber foto slider5',
                'status' => 1,
            ],
        ]);
    }
}
