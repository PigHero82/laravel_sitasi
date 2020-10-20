<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsulanBelanjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usulan_belanja', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('usulan_id')->unsigned();
            $table->mediumInteger('rab_jenis_id')->unsigned();
            $table->text('uraian');
            $table->integer('jumlah')->unsigned();
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
        Schema::dropIfExists('usulan_belanjas');
    }
}
