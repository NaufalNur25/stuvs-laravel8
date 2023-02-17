<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurusans', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('initial')->unique();
            $table->string('nama_jurusan', 115);
            $table->timestamps();
        });
    }

    // public function up()
    // {
    //     Schema::create('jurusans', function (Blueprint $table) {
    //         $table->increments('id');
    //         $table->string('kode_jurusan')->unique();
    //         $table->string('nama_jurusan', 115);
    //         $table->timestamps();
    //     });
    // }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurusans');
    }
}
