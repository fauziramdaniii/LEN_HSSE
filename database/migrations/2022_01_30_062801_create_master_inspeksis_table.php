<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterInspeksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_inspeksis', function (Blueprint $table) {
            $table->id();
            $table->date('periode');
            $table->string('status');
            $table->integer('sudah_inspeksi')->default(0);
            $table->integer('belum_inspeksi')->default(0);
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
        Schema::dropIfExists('master_inspeksis');
    }
}
