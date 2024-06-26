<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagementMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('management_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_management_menu');
            $table->string('nama_management_menu');
            $table->string('icon_management_menu');
            $table->string('link_management_menu');
            $table->string('membawahi_menu_management_menu')->nullable();
            $table->boolean('is_node_management_menu')->nullable();
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
        Schema::dropIfExists('management_menu');
    }
}
