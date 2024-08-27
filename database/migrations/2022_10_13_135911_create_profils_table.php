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
        Schema::create('profils', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->string('nama');
            $table->text('alamat')->nullable();
            $table->string('tlpn')->nullable();
            $table->string('email')->nullable();
            $table->longtext('deskripsi')->nullable();
            $table->text('file')->nullable();
            $table->text('struktur')->nullable();
            $table->string('lg',20);
            $table->string('lt',20);
            $table->string('keterangan')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });
        schema::table('profils', function($table){
             $table->foreign('id_admin')->references('id')->on('users')->onDelete('cascade');

        });
    } 

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['id_admin']);
        Schema::dropIfExists('profils');
    }
};
