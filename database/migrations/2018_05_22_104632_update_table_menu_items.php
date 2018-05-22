<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableMenuItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // takeaway boolean added to indicate whether menu item 
        // is available for takeaway, 1=available, 0=not available.
        Schema::table('menu_items', function (Blueprint $table) {
            $table->boolean('takeaway');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menu_items', function (Blueprint $table) {
            $table->drop('takeaway');
        });
    }
}
