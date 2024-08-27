<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateArsipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsips', function (Blueprint $table) {
            $table->id(); 
            $table->string('judul')->unique();  
            $table->unsignedBigInteger('id_jenis')->nullable();
            $table->unsignedBigInteger('id_admin')->nullable();
            $table->longtext('deskripsi');
            $table->text('file');
            $table->text('keterangan')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('brubah')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('publish_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            
            $table->unsignedBigInteger('id_ad')->nullable();
            $table->unsignedBigInteger('id_de')->nullable();
            $table->unsignedBigInteger('id_publish')->nullable();
           
            $table->enum('publish', ['belum', 'publish'])->default('belum'); 
            $table->boolean('ok')->default(0);
            $table->softDeletes();
        });

        schema::table('arsips', function($table){
            $table->foreign('id_jenis')->references('id')->on('jenis_arsips')->onDelete('cascade');
            $table->foreign('id_admin')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_ad')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_de')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_publish')->references('id')->on('users')->onDelete('cascade');
        });
         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['id_jenis']); 
        Schema::dropForeign(['id_admin']);
        Schema::dropForeign(['id_ad']);
        Schema::dropForeign(['id_de']);
        Schema::dropForeign(['id_publish']);
         Schema::dropIfExists('arsips');
    }
}
