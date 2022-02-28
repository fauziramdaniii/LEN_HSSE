<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAparsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_apars', function (Blueprint $table) {
            $table->id();
            $table->string('tipe');
            $table->string('jenis');
            $table->string('berat');
            $table->string('zona');
            $table->string('lokasi');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('gedung');
            $table->string('lantai');
            $table->string('titik');
            $table->date('kedaluarsa');
            $table->string('keterangan');
            $table->timestamps();
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
        Schema::dropIfExists('data_apars');
    }
}