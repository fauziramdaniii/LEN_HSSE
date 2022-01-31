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
            $table->string('jenis');
            $table->string('noozle');
            $table->string('selang');
            $table->string('tabung');
            $table->date('rambu');
            $table->string('label');
            $table->string('cat');
            $table->string('pin');
            $table->string('roda');
            $table->string('keterangan');
            $table->string('foto');
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
