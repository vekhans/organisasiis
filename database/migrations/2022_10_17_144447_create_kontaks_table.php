<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateKontaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontaks', function (Blueprint $table) {
            $table->id();
            $table->text('nama');
            $table->text('email');
            $table->text('perihal')->nullable();
            $table->longtext('komentar');
            $table->string('url')->nullable();
            $table->string('session_id')->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('ip')->nullable();
            $table->string('agent')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('id_de')->unsigned()->nullable();
            $table->unsignedBigInteger('id_admin')->unsigned()->nullable();
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
        Schema::dropIfExists('kontaks');
    }
}