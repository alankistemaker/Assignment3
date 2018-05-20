<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->unique();
            $table->integer('phone');
        });
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedInteger('staff_id');
            $table->index('staff_id');
            $table->foreign('staff_id')->references('id')->on('staff');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('desc');
        });
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->integer('phone');
            $table->string('email')->unique();
            $table->string('address1');
            $table->string('address2');
            $table->char('state', 3);
        });
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('tablesize');
            $table->unsignedInteger('staff_id');
            $table->unsignedInteger('customer_id');
            $table->index('staff_id');
            $table->index('customer_id');
            $table->foreign('staff_id')->references('id')->on('staff'); 
            $table->foreign('customer_id')->references('id')->on('customers'); 
        });
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('staff_id');
            $table->index('staff_id');
            $table->unsignedInteger('customer_id');
            $table->index('customer_id');
            $table->unsignedInteger('menu_id');
            $table->index('menu_id');
            $table->foreign('staff_id')->references('id')->on('staff');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('menu_id')->references('id')->on('menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('staff');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('orders');
    }
}
