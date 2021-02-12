<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianIndikatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_indikator', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('penilaian_tahap_id');
            $table->string('nama', 100)->nullable();
            $table->string('deskripsi', 255)->nullable();
            $table->boolean('jenis')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('penilaian_indikator');
    }
}
