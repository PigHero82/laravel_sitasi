<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkemaUsulanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skema_usulan', function (Blueprint $table) {
            $table->id();
            $table->integer('skema_id')->unsigned();
            $table->boolean('jenis');
            $table->tinyInteger('jumlah')->unsigned()->default(1);
            $table->year('tahun_skema');
            $table->year('tahun_penelitian');
            $table->date('tanggal_usulan');
            $table->date('tanggal_review');
            $table->date('tanggal_laporan_kemajuan');
            $table->date('tanggal_laporan_akhir');
            $table->date('tanggal_publikasi');
            $table->integer('dana_maksimal')->unsigned()->nullable();
            $table->tinyInteger('jabatan_minimal')->unsigned()->default(0);
            $table->tinyInteger('jabatan_maksimal')->unsigned()->default(99);
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
        Schema::dropIfExists('skema_usulans');
    }
}
