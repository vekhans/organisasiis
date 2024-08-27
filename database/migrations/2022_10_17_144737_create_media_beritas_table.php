<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateMediaBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_beritas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_berita')->nullable();
            $table->enum('jenis', ['foto', 'video']);
            $table->text('file');
            $table->text('caption');
            $table->text('sumber')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('id_ad')->nullable();
            $table->unsignedBigInteger('id_de')->nullable();
            $table->softDeletes();
        });
        schema::table('media_beritas', function($table){
            $table->foreign('id_berita')->references('id')->on('beritas')->onDelete('cascade');
           $table->foreign('id_ad','id_de')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropForeign(['id_berita']); 
        Schema::dropIfExists('media_beritas');
    }
}
