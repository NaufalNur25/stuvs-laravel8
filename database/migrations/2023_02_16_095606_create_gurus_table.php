<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 20)->nullable()->unique();
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin')->default('Laki-laki');
            $table->string('kelas_id')->nullable()->references('id')->on('kelas')->onDelete('cascade');
            $table->string('kode_user')->nullable()->references('kode_user')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gurus');
    }
}
