<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternatifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatif', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_alternatif', 200);
            $table->string('nip_alternatif')->unique();
            $table->string('email_alternatif')->unique();
            $table->text('alamat_alternatif');
            $table->string('nohp_alternatif', 35);
            $table->enum('jenis_kelamin_alternatif', ['L', 'P']);
            $table->string('gambar_alternatif', 200)->nullable();
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
        Schema::dropIfExists('alternatif');
    }
}
