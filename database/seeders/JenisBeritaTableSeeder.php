<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class JenisBeritaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_beritas')->insert([
        	[
        		'id'        => 1,
                'jenis'     => 'Nasional', 
                'id_admin'  => 1,  
            ],
            [ 
            	'id'        => 2,
            	'jenis'     => 'Kabupaten', 
                'id_admin'  => 2, 
            ],    
        ]);
    }
}
