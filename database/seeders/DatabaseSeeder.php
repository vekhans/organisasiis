<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(ProvinsiTableSeeder::class);
        $this->call(KabupatenTableSeeder::class);
        $this->call(KecamatanTableSeeder::class);
        $this->call(DesaTableSeeder::class);
        $this->call(AnggotaTableSeeder::class);
        $this->call(ProfilTableSeeder::class);
        $this->call(MediaProfilTableSeeder::class);
        $this->call(CabangTableSeeder::class);
        $this->call(AnggotaCabangTableSeeder::class);
        $this->call(JenisArsipTableSeeder::class);
        $this->call(ArsipTableSeeder::class);
        $this->call(JenisBeritaTableSeeder::class);
        $this->call(BeritaTableSeeder::class);
        $this->call(KomentarBeritaTableSeeder::class);
        $this->call(KontakTableSeeder::class);
        $this->call(MediaBeritaTableSeeder::class);
        $this->call(PidioTableSeeder::class);
        $this->call(SlideTableSeeder::class);
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
    }
}
