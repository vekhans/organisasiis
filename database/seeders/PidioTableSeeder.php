<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class PidioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pidios')->insert([
            [
            	'id_admin'  => 2,
                'file'      => 'tmFy7WIsG7c',
                'caption'   => 'ini caption video profil 1',
                'sumber'    => 'sumber video profil 1',
                'publish'   => 'publish',
                'id_publish' => 1,
                'id_ad'     => 2,
                'ok'        => 1,
            ],
            [
                'id_admin'  => 2,
                'id_ad'     => 1,
                'id_publish' => 1,
                'file'      => 'MoegRX6QA_k',
                'caption'   => 'ini caption video 2',
                'sumber'    => 'sumber video 2',
                'publish'   => 'publish',
                'ok'        => 1,
            ],
            [
                'id_admin'  => 1,
                'id_ad'     => 3,
                'id_publish' => 2,
                'file'      => 'Ue2PAjEO0zU',
                'caption'   => 'ini caption video  3',
                'sumber'    => 'sumber video 3',
                'publish'   => 'publish',
                'ok'        => 1,
            ],
            [
                'id_admin'  => 2,
                'id_ad'     => 4,
                'id_publish' => 1,
                'file'      => 'MoegRX6QA_k',
                'caption'   => 'ini caption video 4',
                'sumber'    => 'sumber video 4',
                'publish'   => 'publish',
                'ok'        => 1,
            ],
            [
                'id_admin'  => 1,
                'id_ad'     => 2,
                'id_publish' => 4,
                'file'      => 'Ue2PAjEO0zU',
                'caption'   => 'ini caption video 5',
                'sumber'    => 'sumber video saja 5',
                'publish'   => 'belum',
                'ok'        => 0,
            ],
            [
                'id_admin'  => 1,
                'id_ad'     => 1,
                'id_publish' => 1,
                'file'      => 'MoegRX6QA_k',
                'caption'   => 'ini caption video 6',
                'sumber'    => 'sumber video 6 saja',
                'publish'   => 'publish',
                'ok'        => 1,

            ],
            [
                'id_admin'  => 2,
                'file'      => 'Ue2PAjEO0zU',
                'caption'   => 'ini caption video 7',
                'sumber'    => 'sumber video 7',
                'publish'   => 'publish',
                'id_ad'     => 1,
                'id_publish' => 1,
                'ok'        => 1,
                
            ],
            [
                'id_admin'  => 2,
                'file'      => 'Ue2PAjEO0zU',
                'caption'   => 'ini caption video 8',
                'sumber'    => 'sumber video 8',
                'publish'   => 'belum',
                'id_ad'     => 1,
                'id_publish' => 1,
                'ok'        => 1,
            ],
            [
            	'id_admin'  => 1,
                'id_ad'     => 2,
                'id_publish' => 1,
                'file'      => 'MoegRX6QA_k',
                'caption'   => 'ini caption video 9',
                'sumber'    => 'sumber video 9',
                'publish'   => 'belum',
                'ok'        => 0,
            ]
        ]);
    }
}
