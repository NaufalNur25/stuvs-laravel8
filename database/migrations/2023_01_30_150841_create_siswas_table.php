<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_siswa')->nullable()->references('kode_siswa')->on('users')->onDelete('cascade');
            $table->string('kelas_id')->references('id')->on('kelas');
            $table->string('nis', 10)->unique();
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin')->default('Laki-laki');
            $table->string('nilai')->default(100);
            $table->timestamps();
        });
    }

    // public function up()
    // {
    //     Schema::create('siswas', function (Blueprint $table) {
    //         $table->increments('id');
    //         $table->string('kode_siswa')->unique();
    //         $table->string('nis', 10)->unique();
    //         $table->string('nama_lengkap');
    //         $table->unsignedInteger('kelas_id');
    //         $table->string('jenis_kelamin')->default('Laki-laki');
    //         $table->double('nilai', 8, 2)->default(100);
    //         $table->timestamps();
    //         $table->foreign('kelas_id')->references('id')->on('kelas');
    //     });
    // }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
