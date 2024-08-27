<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class ProfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \DB::table('profils')->insert([
            'nama'     => 'Organisasi ITDM',
            'id_admin'     => 1,
            'lg'     => 123.595460,
            'lt'     => -10.182533,
            'tlpn'     => '085237099522',
            'alamat'     => 'Jl. H. R. Koroh, No. 14 Oepura, Kec. Maulafa, Kota Kupang, Nusa Tenggara Timur, Indonesia',
            'email'     => 'kaka.veky@gmail.com',
            'deskripsi'    => 'Nama Organisasi ini adalah Ikatan Tenaga Dalam Murni Flores Timur yang disingkat ITDM Flotim
Visi:
Terwujudnya anggota Ikatan Tenaga Dalam Murni Flores Timur yang berkualitas, berdasarkan Iman Kristiani

Misi:
1.  Mengunggulkan Tuhan di atas segala-galanya.
2.  Meningkatkan kemampuan disiplin anggota Ikatan Tenaga Dalam Murni Flores Timur.
3.  Meningkatkan perlindungan anggota Ikatan Tenaga Dalam Murni Flores Timur serta masyarakat, dan turut menciptakan stabilitas Nasional.
4.  Meningkatkan pembinaan watak dan mental anggota Ikatan Tenaga Dalam Murni Flores Timur dan turut meredam tindak pidana yang dilakukan perorangan maupun kelompok.
5.  Bertanggungjawab terhadap Ikatan Tenaga Dalam Murni Flores Timur baik ke dalam maupun keluar.


Ikatan Tenaga Dalam Murni Flores Timur dideklarasikan pada tanggal 16 Agustus 1993 di Larantuka, Kabupaten Flores Timur – Propinsi Nusa Tenggara Timur, untuk waktu yang tidak ditentukan lamanya.
Hakekat ITDM Ikatan Tenaga Dalam Murni Flores Timur adalah Organisasi Kemasyarakatan yang berpijak pada iman Kristiani dan satu-satunya Organisasi yang menghimpun dan membina segenap anggotanya.
Ikatan Tenaga Dalam Murni Flores Timur bersifat terbatas pada yang beriman Kristiani, yang terungkap dalam Syahadat Para Rasul bagi yang beragama Katolik dan/atau Pengakuan Iman Rasuli bagi yang beragama Protestan.
Dewan Pengurus Pusat Ikatan Tenaga Dalam Murni Flores Timur berkedudukan di Lewoleba, Kabupaten Lembata, Propinsi Nusa Tenggara Timur.
Sentral Pengesahan Ikatan Tenaga Dalam Murni Flores Timur berkedudukan di Kalikasa, Kecamatan Atadei, Kabupaten Lembata, Propinsi Nusa Tenggara Timur.

Hari Besar dan Hari Raya yang diperingati Ikatan Tenaga Dalam Murni Flores Timur, yaitu:
a)  Hari Raya Allah Tri Tunggal Maha Kudus sebagai Dasar dan Pelindung Organisasi
b)  Hari berdirinya Ikatan Tenaga Dalam Murni Flores Timur tanggal 16 Agustus 1993
c)  Hari perjuangan Ikatan Tenaga Dalam Murni Flores Timur tanggal 29 September 1991
d)  Hari berdirinya Cabang/Unit masing-masing
',
            'keterangan'    => '-', 
        ]);
    }
}
