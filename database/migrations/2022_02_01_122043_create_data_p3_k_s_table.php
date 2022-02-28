<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataP3KSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_p3_k_s', function (Blueprint $table) {
            $table->id();
            $table->string('tipe');
            // $table->string('isi');
            // $table->integer('standar');
            $table->string('lokasi');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('zona');
            $table->string('gedung');
            $table->string('lantai');
            $table->string('titik');
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
        Schema::dropIfExists('data_p3_k_s');
    }
}
