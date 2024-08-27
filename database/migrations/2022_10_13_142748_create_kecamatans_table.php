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
        Schema::create('kecamatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama',225)->unique();
            $table->unsignedBigInteger('id_kabupaten')->nullable();
            $table->unsignedBigInteger('id_ad')->nullable();
            $table->unsignedBigInteger('id_de')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });
        schema::table('kecamatans', function($table){
            $table->foreign('id_ad')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_de')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_kabupaten')->references('id')->on('kabupatens')->onDelete('cascade');
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
        Schema::dropForeign(['id_kabupaten']);
        Schema::dropIfExists('kecamatans');
    }
};
