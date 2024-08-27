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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('lengkap')->unique();
            $table->string('file')->default('media/user.png');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('alamat')->nullable();
            $table->string('tlpn')->nullable();
            $table->enum('aturan', ['itam','kuning','ijo'])->default('itam');
            $table->enum('posisi', ['Tamu','Cabang','Admin'])->default('Tamu');
            $table->enum('status', ['mera','ijo'])->default('mera');
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('users');
    }
};
