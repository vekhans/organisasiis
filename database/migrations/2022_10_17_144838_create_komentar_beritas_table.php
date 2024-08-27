<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateKomentarBeritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_beritas', function (Blueprint $table) {
           $table->id();
            $table->unsignedBigInteger('id_berita')->nullable();
            $table->unsignedBigInteger('id_komentar')->nullable();
            $table->text('nama');
            $table->text('email');
            $table->longtext('komentar')->nullable();
            $table->boolean('rating')->nullable();
            $table->string('url')->nullable();
            $table->string('session_id')->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('ip')->nullable();
            $table->string('agent')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('id_de')->nullable();
            $table->softDeletes();
        });
         
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['id_berita']);
        Schema::dropIfExists('komentar_beritas');
    }
}
