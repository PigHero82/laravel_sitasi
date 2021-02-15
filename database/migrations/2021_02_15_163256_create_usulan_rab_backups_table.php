<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsulanRabBackupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usulan_rab_backups', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('usulan_id')->nullable()->unsigned();
            $table->integer('rab_jenis_id')->nullable()->unsigned();
            $table->string('penggunaan', 100)->nullable();
            $table->string('nama', 100)->nullable();
            $table->mediumInteger('item1')->nullable()->unsigned()->default(1);
            $table->string('satuan1', 15)->nullable();
            $table->mediumInteger('item2')->nullable()->unsigned()->default(1);
            $table->string('satuan2', 15)->nullable();
            $table->mediumInteger('item3')->nullable()->unsigned()->default(1);
            $table->string('satuan3', 15)->nullable();
            $table->integer('harga')->nullable()->unsigned();
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
        Schema::dropIfExists('usulan_rab_backups');
    }
}
