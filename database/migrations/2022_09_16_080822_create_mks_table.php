<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode')->unique();
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('rumpun');
            $table->integer('semester');
            $table->string('prasyarat');
            $table->integer('kurikulum');
            $table->integer('bobot_teori');
            $table->integer('bobot_praktikum');
            $table->string('dosen');
            $table->text('materi');
            $table->string('pustaka_utama');
            $table->string('pustaka_pendukung');
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
        Schema::dropIfExists('mks');
    }
}
