<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class KecamatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('kecamatans')->insert(
         	[
	            [
	                'id'			=> 1,
	            	'id_kabupaten'	=> 1,
	            	'nama'			=> 'Kota Raja',
	            	'id_ad'       => 1,
	            ],
	            [
	                'id'			=> 2,
	            	'id_kabupaten'	=> 1,
	            	'nama'			=> 'Oebobo',
	            	'id_ad'       => 1,
	            ],
	            [
	                'id'			=> 3,
	            	'id_kabupaten'	=> 1,
	            	'nama'			=> 'Maulafa',
	            	'id_ad'       => 1,
	            ],
	            [
	                'id'			=> 4,
	            	'id_kabupaten'	=> 2,
	            	'nama'			=> 'Lobalain',
	            	'id_ad'       => 1,
	            ],
	        ]
	    );
    }
}
