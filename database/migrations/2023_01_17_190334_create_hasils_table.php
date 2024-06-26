<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alternatif_id')->unsigned();
            $table->double('total_hasil', 8, 2);
            $table->integer('ranking_hasil');
            $table->integer('selesai_test_id')->unsigned();

            $table->foreign('alternatif_id')->references('id')->on('alternatif')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('selesai_test_id')->references('id')->on('selesai_test')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('hasil');
    }
}
