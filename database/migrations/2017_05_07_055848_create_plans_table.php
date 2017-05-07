<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('profesional_id');
            $table->string('frutas');
            $table->string('verduras');
            $table->string('lacteos_a');
            $table->string('lacteos_b');
            $table->string('carnes');
            $table->string('leguminosas');
            $table->string('cereales');
            $table->string('azucares');
            $table->string('requerimiento');
            $table->string('comentarios');
            $table->softDeletes();
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
        Schema::drop('plans');
    }
}
