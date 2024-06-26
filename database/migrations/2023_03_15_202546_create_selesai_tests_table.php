<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelesaiTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selesai_test', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal_selesai_test');
            $table->string('judul_selesai_test', 200);
            $table->text('keterangan_selesai_test');
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
        Schema::dropIfExists('selesai_test');
    }
}
