<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('nama',225);
            $table->BigInteger('nik')->unique();
            $table->string('email')->unique();
            $table->string('nokta')->unique();
            $table->string('file')->default('media/user.png');
            $table->text('alamat')->nullable();
            $table->integer('tlpn')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki','Perempuan'])->default('Laki-laki');
            $table->enum('agama', ['Kristen Katolik','Kristen Protes','Islam','Hindu','Budha','Konghuchu'])->default('Kristen Katolik');
            $table->enum('status_anggota_cabang', ['Masuk','Belum Masuk'])->default('Belum Masuk');
            $table->string('no_aktanikah')->nullable();
            $table->date('tanggal_aktanikah')->nullable();
            $table->text('file_aktanikah')->nullable();
            $table->string('no_rekomcabang')->nullable();
            $table->date('tanggal_rekomcabang')->nullable();
            $table->text('file_rekomcabang')->nullable();
            $table->string('no_permandian')->nullable();
            $table->date('tanggal_permandian')->nullable();
            $table->text('file_permandian')->nullable();
            $table->enum('status_aktif', ['Aktif','Tidak Aktif'])->default('Aktif');
            $table->string('no_pengesahan')->nullable();
            $table->date('tanggal_pengesahan')->nullable();
            $table->text('file_pengesahan')->nullable();
            $table->unsignedBigInteger('id_desa')->nullable();
            $table->unsignedBigInteger('id_ad')->nullable();
            $table->unsignedBigInteger('id_de')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });
        schema::table('anggotas', function($table){
            $table->foreign('id_ad')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_de')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_desa')->references('id')->on('desas')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['id_ad']);
        Schema::dropForeign(['id_de']);
        Schema::dropForeign(['id_desa']);
        Schema::dropIfExists('anggotas');
    }
};
