<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailInpeksiAparsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_inpeksi_apars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id');
            $table->foreignId('apart_id');
            $table->string('jenis')->nullable();
            $table->string('noozle')->nullable();
            $table->string('selang')->nullable();
            $table->string('tabung')->nullable();
            $table->string('rambu')->nullable();
            $table->string('label')->nullable();
            $table->string('cat')->nullable();
            $table->string('pin')->nullable();
            $table->string('roda')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('foto')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('pemeriksa')->nullable();
            $table->foreign('periode_id')->references('id')->on('master_inspeksis');
            $table->foreign('apart_id')->references('id')->on('data_apars');

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
        Schema::dropIfExists('detail_inpeksi_apars');
    }
}
