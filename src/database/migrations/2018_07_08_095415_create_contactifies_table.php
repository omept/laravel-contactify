<?php

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
            $table->string('email', 255)->nullable();
            $table->string('subject', 255)->nullable();
            $table->string('mobile', 255)->nullable();
            $table->string('name', 255)->nullable();
            $table->text('message')->nullable();
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
