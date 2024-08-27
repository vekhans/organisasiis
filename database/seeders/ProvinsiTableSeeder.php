<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class ProvinsiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('provinsis')->insert(
         	[
	            [
	                'id'       => 1,
	            	'nama'     => 'Nusa Tenggara Timur',
	            	'id_ad'       => 1,
	            ],
	            [
	                'id'       => 2,
	            	'nama'     => 'Nusa Tenggara Barat',
	            	'id_ad'       => 1,
	            ],
	            [
	                'id'       => 3,
	            	'nama'     => 'Bali',
	            	'id_ad'       => 1,
	            ],
	            [
	                'id'       => 4,
	            	'nama'     => 'Jawa Timur',
	            	'id_ad'       => 1,
	            ],
	            [
	                'id'       => 5,
	            	'nama'     => 'Jawa Barat',
	            	'id_ad'       => 1,
	            ],
	        ]
	    );
    }
}
