<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataP3ksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_p3ks', function (Blueprint $table) {
            $table->id();
            $table->string('kd_p3k')->unique();
            $table->string('tipe');
            // $table->string('isi');
            // $table->integer('standar');
            $table->string('lokasi');
            $table->string('provinsi');
            $table->string('kota');
            $table->foreignId('zona_id')->nullable();
            $table->string('gedung');
            $table->string('lantai');
            $table->string('titik');
            $table->string('keterangan');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('zona_id')->references('id')->on('zona_lokasis')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_p3ks');
    }
}
