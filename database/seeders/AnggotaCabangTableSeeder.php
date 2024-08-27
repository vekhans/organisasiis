<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class AnggotaCabangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('anggota_cabangs')->insert(
			[
				[
					'id'		=> 1,
		    		'id_cabang'		=> 1,
		        	'id_anggota'	=> 37,
		    	],
		    	[
					'id'		=> 2,
		    		'id_cabang'		=> 1,
		        	'id_anggota'	=> 38,
		    	],
		    	[
					'id'		=> 3,
		    		'id_cabang'		=> 1,
		        	'id_anggota'	=> 39,
		    	],
		    	[
					'id'		=> 4,
		    		'id_cabang'		=> 1,
		        	'id_anggota'	=> 40,
		    	],
		    	[
					'id'		=> 5,
		    		'id_cabang'		=> 1,
		        	'id_anggota'	=> 41,
		    	],
		    	[
					'id'		=> 6,
		    		'id_cabang'		=> 1,
		        	'id_anggota'	=> 42,
		    	],

		    ]
		);

    }
}
