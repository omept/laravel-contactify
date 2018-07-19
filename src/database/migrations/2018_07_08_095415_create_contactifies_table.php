<?php

/**
 * This file is part of Contactify,
 * a feedback management solution for Laravel.
 *
 * @license MIT
 * @package Onwuasoanya\contactify
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactifies', function (Blueprint $table) {
            $table->increments('id');
            $table->text('key_indexs')->nullable();
            $table->text('key_value_pair')->nullable();
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
        Schema::dropIfExists('contactifies');
    }
}
