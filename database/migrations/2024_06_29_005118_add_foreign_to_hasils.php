<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToHasils extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hasil', function (Blueprint $table) {
            //
            $table->foreign('selesai_test_id')->references('id')->on('selesai_test')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hasil', function (Blueprint $table) {
            //
            $table->dropForeign(['selesai_test_id']);
        });
    }
}
