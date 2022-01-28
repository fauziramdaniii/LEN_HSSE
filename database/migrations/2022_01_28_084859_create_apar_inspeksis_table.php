<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAparInspeksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apar_inspeksis', function (Blueprint $table) {
            $table->id();
            $table->string('tipe');
            $table->string('berat');
            $table->string('zona');
            $table->string('lokasi');
            $table->date('kedaluarsa');
            $table->string('keterangan');
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
        Schema::dropIfExists('apar_inspeksis');
    }
}
