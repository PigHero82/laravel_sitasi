<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsulanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usulan', function (Blueprint $table) {
            $table->id();
            $table->integer('skema_usulan_id')->unsigned();
            $table->boolean('jenis');
            $table->string('judul', 250)->nullable();
            $table->text('ringkasan')->nullable();
            $table->text('latar_belakang')->nullable();
            $table->text('tinjauan_pustaka')->nullable();
            $table->text('metode')->nullable();
            $table->text('daftar_pustaka')->nullable();
            $table->integer('rumpun_ilmu_id')->unsigned()->nullable();
            $table->string('program', 100)->nullable();
            $table->string('kategori_sbk', 100)->nullable();
            $table->tinyInteger('waktu')->nullable();
            $table->boolean('satuan_waktu_id')->nullable();
            $table->string('bidang_unggulan_pt', 100)->nullable();
            $table->string('topik_unggulan_pt', 100)->nullable();
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
        Schema::dropIfExists('usulans');
    }
}
