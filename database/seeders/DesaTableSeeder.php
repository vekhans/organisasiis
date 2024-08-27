<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class DesaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desas')->insert(
         	[
	            [
	                'id'			=> 1,
	            	'id_kecamatan'	=> 1,
	            	'jenis'			=> 'Kelurahan',
	            	'nama'			=> 'Naikoten',
	            	'id_ad'       => 1,
	            ],
	            [
	                'id'			=> 2,
	            	'id_kecamatan'	=> 2,
	            	'jenis'			=> 'Kelurahan',
	            	'nama'			=> 'Kayu Putih',
	            	'id_ad'       => 1,
	            ],
	            [
	                'id'			=> 3,
	            	'id_kecamatan'	=> 1,
	            	'jenis'			=> 'Desa',
	            	'nama'			=> 'Oepura',
	            	'id_ad'       => 1,
	            ],
	            [
	                'id'			=> 4,
	            	'id_kecamatan'	=> 2,
	            	'jenis'			=> 'Kelurahan',
	            	'nama'			=> 'kolhua',
	            	'id_ad'       => 1,
	            ],
	        ]
	    );
    }
}
