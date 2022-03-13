<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspeksiP3KSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspeksi_p3_k_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id');
            $table->foreignId('p3k_id');
            $table->string('status');
            // $table->integer('jumlah');
            $table->string('keterangan')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('pemeriksa')->nullable();
            $table->string('foto')->nullable();
            $table->foreign('periode_id')->references('id')->on('master_inspeksi_p3_k_s');
            $table->foreign('p3k_id')->references('id')->on('data_p3_k_s');
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
        Schema::dropIfExists('inspeksi_p3_k_s');
    }
}
