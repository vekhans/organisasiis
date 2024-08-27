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
        Schema::create('desas', function (Blueprint $table) {
           $table->id();
            $table->unsignedBigInteger('id_kecamatan')->nullable();
            $table->enum('jenis', ['Kelurahan','Desa'])->default('Kelurahan');
            $table->string('nama',255)->unique();
            $table->unsignedBigInteger('id_ad')->nullable();
            $table->unsignedBigInteger('id_de')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });
        schema::table('desas', function($table){
            $table->foreign('id_ad')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_de')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_kecamatan')->references('id')->on('kecamatans')->onDelete('cascade');
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
        Schema::dropForeign(['id_kecamatan']);
        Schema::dropIfExists('desas');
    }
};
