<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaSubkriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria_subkriteria', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kriteria_id')->unsigned();
            $table->integer('sub_kriteria_id')->unsigned();
            $table->integer('alternatif_id')->unsigned();
            $table->double('nilai_kriteria_subkriteria', 8, 2);

            $table->foreign('kriteria_id')->references('id')->on('kriteria')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sub_kriteria_id')->references('id')->on('sub_kriteria')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('alternatif_id')->references('id')->on('alternatif')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('kriteria_subkriteria');
    }
}
