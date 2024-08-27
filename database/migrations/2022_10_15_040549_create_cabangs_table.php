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
        Schema::create('cabangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kabupaten')->nullable();
            $table->string('periode')->nullable();
            $table->string('nama')->nullable();
            $table->timestamp('tgl_pelantikan')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            // $table->text('file_pelantikan')->nullable();
            $table->unsignedBigInteger('pembina')->nullable();
            $table->unsignedBigInteger('ketua')->nullable();
            $table->unsignedBigInteger('wakil_ketua')->nullable();
            $table->unsignedBigInteger('sekretaris_1')->nullable();
            $table->unsignedBigInteger('sekretaris_2')->nullable();
            $table->unsignedBigInteger('bendahara_1')->nullable();
            $table->unsignedBigInteger('bendahara_2')->nullable();
            $table->unsignedBigInteger('kasek_penerimaan')->nullable();
            $table->unsignedBigInteger('seksek_penerimaan')->nullable();
            $table->unsignedBigInteger('kasek_kesehatan')->nullable();
            $table->unsignedBigInteger('seksek_kesehatan')->nullable();
            $table->unsignedBigInteger('kasek_penyegaran')->nullable();
            $table->unsignedBigInteger('seksek_penyegaran')->nullable();
            $table->unsignedBigInteger('kasek_logistik')->nullable();
            $table->unsignedBigInteger('seksek_logistik')->nullable();
            $table->unsignedBigInteger('kasek_dokumentasi')->nullable();
            $table->unsignedBigInteger('seksek_dokumentasi')->nullable();
            // $table->text('file_pemberhentian')->nullable();
            // $table->timestamp('tgl_pemberhentian')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->enum('satus_cabang', ['Aktif','Tidak Aktif'])->default('Aktif');    
            $table->unsignedBigInteger('id_ad')->nullable();
            $table->unsignedBigInteger('id_de')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });

       schema::table('cabangs', function($table){
            $table->foreign('id_ad')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_de')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropForeign(['pembina']);
        Schema::dropForeign(['ketua']);
        Schema::dropForeign(['wakil_ketua']);
        Schema::dropForeign(['sekretaris_1']);
        Schema::dropForeign(['sekretaris_2']);
        Schema::dropForeign(['bendahara_1']);
        Schema::dropForeign(['bendahara_2']);
        Schema::dropForeign(['kasek_penerimaan']);
        Schema::dropForeign(['seksek_penerimaan']);
        Schema::dropForeign(['kasek_kesehatan']);
        Schema::dropForeign(['seksek_kesehatan']);
        Schema::dropForeign(['kasek_penyegaran']);
        Schema::dropForeign(['seksek_penyegaran']);
        Schema::dropForeign(['kasek_logistik']);
        Schema::dropForeign(['seksek_logistik']);
        Schema::dropForeign(['kasek_dokumentasi']);
        Schema::dropForeign(['seksek_dokumentasi']);
        Schema::dropIfExists('cabangs');
    }
};
