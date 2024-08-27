<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class AnggotaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anggotas')->insert(
         	[
	            [
	                'id'		=> 1,
	            	'nama'		=> 'anggota1',
	                
	                'nik'  		=> 1234567198765432,
	                'nokta'  	=> 'nokta12345671',
	                
	            	'email'		=> 'anggota@gmail.com',
	            	'status_anggota_cabang'	=>'Belum Masuk',
	            	'id_desa'	=> 1,
	            ],
	            [
	                'id'		=> 2,
	            	'nama'		=> 'anggota2',
	                
	                'nik'  		=> 22345672,
	                'nokta'  	=> 'nokta22345672',
	                
	            	'email'		=> 'anggota2@gmail.com',
	            	'status_anggota_cabang'	=>'Belum Masuk',
	            	'id_desa'	=> 2,
	            ],
	            [
	                'id'		=> 3,
	            	'nama'		=> 'anggota3',
	                
	                'nik'  		=> 32345673,
	                'nokta'  	=> 'nokta32345673',
	                
	            	'email'		=> 'anggota3@gmail.com',
	            	'status_anggota_cabang'	=>'Belum Masuk',
	            	'id_desa'	=> 3,
	            ],
	            [
	                'id'		=> 4,
	            	'nama'		=> 'anggota4',
	                
	                'nik'  		=> 42345674,
	                'nokta'  	=> 'nokta42345674',
	                
	            	'email'		=> 'anggota4@gmail.com',
	            	'status_anggota_cabang'	=>'Belum Masuk',
	            	'id_desa'	=> 1,
	            ],
	            [
	                'id'		=> 5,
	            	'nama'		=> 'anggota5',
	                
	                'nik'  		=> 52345675,
	                'nokta'  	=> 'nokta52345675',
	                
	            	'email'		=> 'anggota5@gmail.com',
	            	'status_anggota_cabang'	=>'Belum Masuk',
	            	'id_desa'	=> 2,
	            ],
	            [
	                'id'		=> 6,
	            	'nama'		=> 'anggota6',
	                
	                'nik'  		=> 62345676,
	                'nokta'  	=> 'nokta62345676',
	                
	            	'email'		=> 'anggota6@gmail.com',
	            	'status_anggota_cabang'	=>'Belum Masuk',
	            	'id_desa'	=> 1,
	            ],
	            [
	                'id'		=> 7,
	            	'nama'		=> 'anggota7',
	                
	                'nik'  		=> 72345677,
	                'nokta'  	=> 'nokta72345677',
	                
	            	'email'		=> 'anggota7@gmail.com',
	            	'status_anggota_cabang'	=>'Belum Masuk',
	            	'id_desa'	=> 3,
	            ],
	            [
	                'id'		=> 8,
	            	'nama'		=> 'anggota8',
	                
	                'nik'  		=> 82345678,
	                'nokta'  	=> 'nokta82345678',
	                
	            	'email'		=> 'anggota8@gmail.com',
	            	'status_anggota_cabang'	=>'Belum Masuk',
	            	'id_desa'	=> 1,
	            ],
	            [
	                'id'		=> 9,
	            	'nama'		=> 'anggota9',
	                
	                'nik'  		=> 92345679,
	                'nokta'  	=> 'nokta92345679',
	                
	            	'email'		=> 'anggota9@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 10,
	            	'nama'		=> 'anggota10',
	                
	                'nik'  		=> 1023456710,
	                'nokta'  	=> 'nokta1023456710',
	                
	            	'email'		=> 'anggota10@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 11,
	            	'nama'		=> 'anggota11',
	                
	                'nik'  		=> 1123456711,
	                'nokta'  	=> 'nokta1123456711',
	                
	            	'email'		=> 'anggota11@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 12,
	            	'nama'		=> 'anggota12',
	                
	                'nik'  		=> 1223456712,
	                'nokta'  	=> 'nokta1223456712',
	                
	            	'email'		=> 'anggota12@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 13,
	            	'nama'		=> 'anggota13',
	                
	                'nik'  		=> 1323456713,
	                'nokta'  	=> 'nokta1323456713',
	                
	            	'email'		=> 'anggota13@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 14,
	            	'nama'		=> 'anggota14',
	                
	                'nik'  		=> 1423456714,
	                'nokta'  	=> 'nokta1423456714',
	                
	            	'email'		=> 'anggota14@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 15,
	            	'nama'		=> 'anggota15',
	                
	                'nik'  		=> 1523456715,
	                'nokta'  	=> 'nokta1523456715',
	                
	            	'email'		=> 'anggota15@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 16,
	            	'nama'		=> 'anggota16',
	                
	                'nik'  		=> 1623456716,
	                'nokta'  	=> 'nokta1623456716',
	                
	            	'email'		=> 'anggota16@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 17,
	            	'nama'		=> 'anggota17',
	                
	                'nik'  		=> 1723456717,
	                'nokta'  	=> 'nokta1723456717',
	                
	            	'email'		=> 'anggota17@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 18,
	            	'nama'		=> 'anggota18',
	                
	                'nik'  		=> 1823456718,
	                'nokta'  	=> 'nokta1823456718',
	                
	            	'email'		=> 'anggota18@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 19,
	            	'nama'		=> '1anggota19',
	                
	                'nik'  		=> 192345679,
	                'nokta'  	=> 'nokta923456719',
	                
	            	'email'		=> 'anggota19@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 20,
	            	'nama'		=> 'anggota20',
	                
	                'nik'  		=> 2023456720,
	                'nokta'  	=> 'nokta2023456720',
	                
	            	'email'		=> 'anggota20@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 21,
	            	'nama'		=> 'anggota21',
	                
	                'nik'  		=> 2123456721,
	                'nokta'  	=> 'nokta2123456721',
	                
	            	'email'		=> 'anggota21@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 22,
	            	'nama'		=> 'anggota22',
	                
	                'nik'  		=> 2223456722,
	                'nokta'  	=> 'nokta2223456722',
	                
	            	'email'		=> 'anggota22@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 23,
	            	'nama'		=> 'anggota23',
	                
	                'nik'  		=> 2323456723,
	                'nokta'  	=> 'nokta2323456723',
	                
	            	'email'		=> 'anggota23@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 24,
	            	'nama'		=> 'anggota24',
	                
	                'nik'  		=> 2423456724,
	                'nokta'  	=> 'nokta2423456724',
	                
	            	'email'		=> 'anggota24@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 25,
	            	'nama'		=> 'anggota25',
	                
	                'nik'  		=> 2523456725,
	                'nokta'  	=> 'nokta2523456725',
	                
	            	'email'		=> 'anggota25@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 26,
	            	'nama'		=> 'anggota26',
	                
	                'nik'  		=> 2623456726,
	                'nokta'  	=> 'nokta2623456726',
	                
	            	'email'		=> 'anggota26@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 27,
	            	'nama'		=> 'anggota27',
	                
	                'nik'  		=> 2723456727,
	                'nokta'  	=> 'nokta2723456727',
	                
	            	'email'		=> 'anggota27@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 28,
	            	'nama'		=> 'anggota28',
	                
	                'nik'  		=> 2823456728,
	                'nokta'  	=> 'nokta2823456728',
	                
	            	'email'		=> 'anggota28@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 29,
	            	'nama'		=> 'anggota29',
	                
	                'nik'  		=> 2923456729,
	                'nokta'  	=> 'nokta2923456729',
	                
	            	'email'		=> 'anggota29@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 30,
	            	'nama'		=> 'anggota30',
	                
	                'nik'  		=> 3023456730,
	                'nokta'  	=> 'nokta3023456730',
	                
	            	'email'		=> 'anggota30@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 31,
	            	'nama'		=> 'anggota31',
	                
	                'nik'  		=> 3123456731,
	                'nokta'  	=> 'nokta3123456731',
	                
	            	'email'		=> 'anggota31@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 32,
	            	'nama'		=> 'anggota32',
	                
	                'nik'  		=> 3223456732,
	                'nokta'  	=> 'nokta3223456732',
	                
	            	'email'		=> 'anggota32@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 33,
	            	'nama'		=> 'anggota33',
	                
	                'nik'  		=> 3323456733,
	                'nokta'  	=> 'nokta3323456733',
	                
	            	'email'		=> 'anggota33@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 34,
	            	'nama'		=> 'anggota34',
	                
	                'nik'  		=> 3423456734,
	                'nokta'  	=> 'nokta3423456734',
	                
	            	'email'		=> 'anggota34@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 35,
	            	'nama'		=> 'anggota35',
	                
	                'nik'  		=> 3523456735,
	                'nokta'  	=> 'nokta3523456735',
	                
	            	'email'		=> 'anggota35@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 36,
	            	'nama'		=> 'anggota36',
	                
	                'nik'  		=> 3623456736,
	                'nokta'  	=> 'nokta3623456736',
	                
	            	'email'		=> 'anggota36@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 37,
	            	'nama'		=> 'anggota37',
	                
	                'nik'  		=> 3723456737,
	                'nokta'  	=> 'nokta3723456737',
	                
	            	'email'		=> 'anggota37@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 38,
	            	'nama'		=> 'anggota38',
	                
	                'nik'  		=> 3823456738,
	                'nokta'  	=> 'nokta3823456738',
	                
	            	'email'		=> 'anggota38@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 39,
	            	'nama'		=> 'anggota39',
	                
	                'nik'  		=> 39234567987654439,
	                'nokta'  	=> 'nokta3923456739',
	                
	            	'email'		=> 'anggota39@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 40,
	            	'nama'		=> 'anggota40',
	                
	                'nik'  		=> 4023456740,
	                'nokta'  	=> 'nokta4023456740',
	                
	            	'email'		=> 'anggota40@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 41,
	            	'nama'		=> 'anggota41',
	                
	                'nik'  		=> 4123456741,
	                'nokta'  	=> 'nokta4123456741',
	                
	            	'email'		=> 'anggota41@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 42,
	            	'nama'		=> 'anggota42',
	                
	                'nik'  		=> 4223456742,
	                'nokta'  	=> 'nokta4223456742',
	                
	            	'email'		=> 'anggota42@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 43,
	            	'nama'		=> 'anggota43',
	                
	                'nik'  		=> 422345673,
	                'nokta'  	=> 'nokta422345673',
	                
	            	'email'		=> 'anggota43@gmail.com',
	            	'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 44,
	            	'nama'		=> 'anggota44',                
	                'nik'  		=> 4423456744,
	                'nokta'  	=> 'nokta4423456744',
	                'email'		=> 'anggota44@gmail.com',
	                'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ],
	            [
	                'id'		=> 45,
	            	'nama'		=> 'anggota45',
	                'nik'  		=> 4523456745,
	                'nokta'  	=> 'nokta4523456745',
	                'email'		=> 'anggota45@gmail.com',
	                'status_anggota_cabang'	=>'Masuk',
	            	'id_desa'	=> 4,
	            ], 

	        ]
	    );
    }
}
