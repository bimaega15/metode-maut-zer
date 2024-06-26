<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hasil_id')->unsigned();
            $table->integer('kriteria_id')->unsigned();
            $table->double('nilai_hasil_detail', 8, 2);

            $table->foreign('hasil_id')->references('id')->on('hasil')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kriteria_id')->references('id')->on('kriteria')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('hasil_detail');
    }
}
