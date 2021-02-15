<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsulanBerkasBackupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usulan_berkas_backups', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('usulan_id')->nullable()->unsigned();
            $table->boolean('jenis_berkas_id')->nullable();
            $table->string('berkas', 255)->nullable();
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
        Schema::dropIfExists('usulan_berkas_backups');
    }
}
