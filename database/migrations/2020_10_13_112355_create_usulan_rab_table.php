<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsulanRabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usulan_rab', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('usulan_id')->unsigned();
            $table->tinyInteger('urutan_tahun')->unsigned();
            $table->integer('rab_jenis_id')->unsigned();
            $table->string('penggunaan', 100);
            $table->string('nama', 100);
            $table->mediumInteger('item1')->unsigned()->nullable();
            $table->string('satuan1', 15)->nullable();
            $table->mediumInteger('item2')->unsigned()->nullable();
            $table->string('satuan2', 15)->nullable();
            $table->mediumInteger('item3')->unsigned()->nullable();
            $table->string('satuan3', 15)->nullable();
            $table->integer('harga')->unsigned();
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
        Schema::dropIfExists('usulan_rabs');
    }
}
