<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->string('nidn', 15);
            $table->string('nama', 150);
            $table->text('alamat')->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('ktp', 20)->nullable();
            $table->string('telepon', 15)->nullable();
            $table->string('hp', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('web', 100)->nullable();
            $table->tinyInteger('jabatan_id')->unsigned()->nullable();
            $table->tinyInteger('prodi_id')->unsigned()->nullable();
            $table->string('sinta_id', 50)->nullable();
            $table->string('google_scholar_id', 50)->nullable();
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
        Schema::dropIfExists('dosen');
    }
}
