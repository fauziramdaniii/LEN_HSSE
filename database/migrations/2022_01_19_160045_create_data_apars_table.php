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
            $table->string('kd_apar')->unique()->nullable();
            $table->foreignId('tipe_id')->nullable();
            $table->foreignId('jenis_id')->nullable();
            $table->double('berat');
            $table->foreignId('zona_id')->nullable();
            $table->string('lokasi');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('gedung');
            $table->string('lantai');
            $table->string('titik');
            $table->date('kedaluarsa');
            $table->string('keterangan');
            $table->foreign('tipe_id')->references('id')->on('tipe_apars')->onDelete('set null');
            $table->foreign('jenis_id')->references('id')->on('jenis_apars')->onDelete('set null');
            $table->foreign('zona_id')->references('id')->on('zona_lokasis')->onDelete('set null');
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
