<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonfigurasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfigurasi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_konfigurasi', 200);
            $table->string('logo_konfigurasi', 250);
            $table->string('nohp_konfigurasi', 200);
            $table->text('alamat_konfigurasi');
            $table->string('email_konfigurasi')->unique();
            $table->text('deskripsi_konfigurasi');
            $table->string('created_konfigurasi');
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
        Schema::dropIfExists('konfigurasi');
    }
}
