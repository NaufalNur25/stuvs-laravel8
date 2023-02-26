<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi_laporan')->nullable();
            $table->datetime('tanggal_waktu');
            $table->string('user_id')->references('id')->on('user');
            $table->string('nis', 10)->references('nis')->on('siswas')->onDelete('cascade');
            $table->string('kategori_laporan_id')->references('id')->on('kategori_laporans')->onDelete('cascade');
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
        Schema::dropIfExists('laporans');
    }
}
