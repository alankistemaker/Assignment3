<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrderMenuItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_menu_items', function (Blueprint $table) {
            $table->timestamps();
            $table->unsignedInteger('menu_item_id');
            $table->unsignedInteger('order_id');
            $table->index('menu_item_id');
            $table->index('order_id');
            $table->foreign('menu_item_id')->references('id')->on('menu_items');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_menu_items');
    }
}
