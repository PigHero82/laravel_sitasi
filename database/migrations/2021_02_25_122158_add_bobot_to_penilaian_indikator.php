<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBobotToPenilaianIndikator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penilaian_indikator', function (Blueprint $table) {
            $table->tinyInteger('bobot')->nullable()->default(1)->after('jenis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penilaian_indikator', function (Blueprint $table) {
            $table->dropColumn(['bobot']);
        });
    }
}
