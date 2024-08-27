<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB; 

class JenisArsipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_arsips')->insert([
        	[
        		'id'        => 1,
                'jenis'     => 'jurnal', 
                'id_admin'  => 1,  
            ],
            [ 
            	'id'        => 2,
            	'jenis'     => 'peraturan', 
                'id_admin'  => 2, 
            ],    
        ]);
    }
}
