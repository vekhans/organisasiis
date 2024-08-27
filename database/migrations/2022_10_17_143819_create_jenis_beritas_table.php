<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateJenisBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_beritas', function (Blueprint $table) {
            $table->id();
            $table->string('jenis')->unique();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->unsignedBigInteger('id_ad')->nullable();
            $table->unsignedBigInteger('id_de')->nullable();
            $table->softDeletes();
        });

        schema::table('jenis_beritas', function($table){
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
        Schema::dropIfExists('jenis_beritas');
    }
}
