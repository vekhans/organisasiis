<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB; 
class KabupatenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('kabupatens')->insert(
         	[
	            [
	                'id'			=> 1,
	            	'id_provinsi'	=> 1,
	            	'nama'			=> 'Kota Kupang',
	            	'id_ad'       => 1,
	            ],
	            [
	                'id'			=> 2,
	            	'id_provinsi'	=> 1,
	            	'nama'			=> 'Rote',
	            	'id_ad'       => 1,
	            ],
	            [
	                'id'			=> 3,
	            	'id_provinsi'	=> 1,
	            	'nama'			=> 'Kabupaten Kupang',
	            	'id_ad'       => 1,
	            ],
	            [
	                'id'			=> 4,
	            	'id_provinsi'	=> 2,
	            	'nama'			=> 'Sumbawa',
	            	'id_ad'       => 1,
	            ],
	        ]
	    );
    }
}
