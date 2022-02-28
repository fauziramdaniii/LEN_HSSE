<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsiInspeksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isi_inspeksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inspeksi_id');
            $table->foreignId('isi_id');
            $table->integer('jumlah')->nullable();
            $table->string('keterangan')->nullable();
            $table->foreign('inspeksi_id')->references('id')->on('inspeksi_p3_k_s');
            $table->foreign('isi_id')->references('id')->on('isi_p3_k_s');
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
        Schema::dropIfExists('isi_inspeksis');
    }
}
