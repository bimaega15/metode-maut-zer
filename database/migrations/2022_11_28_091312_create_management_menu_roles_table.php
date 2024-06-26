<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagementMenuRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('management_menu_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('management_menu_id')->unsigned();
            $table->integer('roles_id')->unsigned();
            $table->boolean('is_create')->nullable();
            $table->boolean('is_update')->nullable();
            $table->boolean('is_delete')->nullable();
            $table->timestamps();

            $table->foreign('management_menu_id')->references('id')->on('management_menu')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('management_menu_roles');
    }
}
