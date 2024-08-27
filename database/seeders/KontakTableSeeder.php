<?php


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class KontakTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kontaks')->insert([
        	[
        		'id'             => 1,
                'nama'     => 'Kaaka', 
                'email'    => 'secret@gmail.com',
                'komentar'     => 'komentar 1',
            ],
            [ 
            	'id'             => 2,
            	'nama'     => 'Veky',
            	'email'    => 'skpd@gmail.com',
                'komentar'     => 'komentar 2',
            ]    
        ]);
    }
}
