<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspeksiP3ksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspeksi_p3ks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id');
            $table->foreignId('p3k_id');
            $table->string('status');
            // $table->integer('jumlah');
            $table->string('keterangan')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('pemeriksa')->nullable();
            $table->string('foto')->nullable();
            $table->foreign('periode_id')->references('id')->on('master_inspeksi_p3ks');
            $table->foreign('p3k_id')->references('id')->on('data_p3ks');
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
        Schema::dropIfExists('inspeksi_p3ks');
    }
}
