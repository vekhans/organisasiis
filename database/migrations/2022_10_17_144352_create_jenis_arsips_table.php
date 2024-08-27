<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisArsipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_arsips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->string('jenis')->unique();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('id_ad')->nullable()->unsigned();
            $table->unsignedBigInteger('id_de')->nullable()->unsigned();
            $table->softDeletes();

        });
        schema::table('jenis_arsips', function($table){
            $table->foreign('id_ad')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('id_de')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('jenis__arsips');
    }
}
