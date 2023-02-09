<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->string('id')->index();
            $table->string('jurusan_id')->references('id')->on('jurusans');
            $table->string('nama_kelas', 115);
            $table->timestamps();
        });
    }

    // public function up()
    // {
    //     Schema::create('kelas', function (Blueprint $table) {
    //         $table->increments('id');
    //         $table->unsignedInteger('jurusan_id');
    //         $table->string('kode_kelas', 115)->unique();
    //         $table->string('nama_kelas', 115);
    //         $table->timestamps();
    //         $table->foreign('jurusan_id')->references('id')->on('jurusans');
    //     });
    // }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}
