<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class CabangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cabangs')->insert(
         	[
	            [
	                'id'			=> 1,
	            	'id_kabupaten'	=> 2,
	            	'nama'	=> 'rote',
	            	'pembina'			=> 20,
	            	'wakil_ketua'			=> 21,
	            	'sekretaris_1'			=> 22,
	            	'sekretaris_2'			=> 23,
	            	'bendahara_1'			=> 24,
	            	'bendahara_2'			=> 25,
	            	'kasek_penerimaan'		=> 26,
	            	'seksek_penerimaan'		=> 27,
	            	'kasek_kesehatan'		=> 28,
	            	'seksek_kesehatan'		=> 29,
	            	'kasek_penyegaran'		=> 30,
	            	'seksek_penyegaran'		=> 31,
	            	'kasek_logistik'		=> 32,
	            	'seksek_logistik'		=> 33,
	            	'kasek_dokumentasi'		=> 34,
	            	'seksek_dokumentasi'	=> 35,
	            	'ketua'					=>36,
	            	'periode'				=>'2022/2027', 


	            ],
	        ]
	    );
    }
}
