<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsulanLuaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usulan_luaran', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('usulan_id')->unsigned();
            $table->boolean('tahun');
            $table->integer('luaran_luaran_id')->unsigned();
            $table->integer('luaran_target_id')->unsigned();
            $table->tinyInteger('jumlah')->unsigned();
            $table->string('keterangan', 255)->nullable();
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
        Schema::dropIfExists('usulan_luaran');
    }
}
