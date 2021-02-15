<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsulanLuaranBackupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usulan_luaran_backups', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('usulan_id')->nullable()->unsigned();
            $table->boolean('tahun')->nullable();
            $table->integer('luaran_luaran_id')->nullable()->unsigned();
            $table->integer('luaran_target_id')->nullable()->unsigned();
            $table->tinyInteger('jumlah')->nullable()->unsigned();
            $table->string('keterangan', 255)->nullable();
            $table->tinyInteger('review')->nullable()->unsigned();
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
        Schema::dropIfExists('usulan_luaran_backups');
    }
}
