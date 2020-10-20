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
            $table->bigInteger('dosen_id')->unsigned();
            $table->integer('skema_usulan_id')->unsigned();
            $table->boolean('jenis');
            $table->string('judul', 250)->nullable();
            $table->text('ringkasan')->nullable();
            $table->text('kata_kunci')->nullable();
            $table->text('latar_belakang')->nullable();
            $table->text('tinjauan_pustaka')->nullable();
            $table->text('metode')->nullable();
            $table->text('daftar_pustaka')->nullable();
            $table->integer('rumpun_ilmu_1')->unsigned()->nullable();
            $table->integer('rumpun_ilmu_2')->unsigned()->nullable();
            $table->integer('rumpun_ilmu_3')->unsigned()->nullable();
            $table->mediumInteger('nilai')->unsigned()->nullable();
            $table->boolean('step')->default(1);
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
