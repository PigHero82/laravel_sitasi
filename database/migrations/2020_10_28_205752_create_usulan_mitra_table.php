<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsulanMitraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usulan_mitra', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('usulan_id')->unsigned();
            $table->string('nama', 255);
            $table->string('pimpinan', 100);
            $table->string('mitra_jenis_id', 100);
            $table->string('institusi', 100);
            $table->string('alamat', 100);
            $table->string('kecamatan_id', 100);
            $table->string('kabkota_id', 100);
            $table->string('provinsi_id', 100);
            $table->string('tlp', 12);
            $table->string('hp', 15)->nullable();
            $table->string('fax', 12)->nullable();
            $table->string('email', 100)->nullable();
            $table->integer('dana')->unsigned()->default(0)->nullable();
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
        Schema::dropIfExists('usulan_mitra');
    }
}
