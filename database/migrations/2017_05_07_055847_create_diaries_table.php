<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('profesional_id')->default(0);
            $table->string('comida');
            $table->integer('hora');
            $table->string('alimento');
            $table->string('preparacion');
            $table->string('cantidad');
            $table->string('kcal');
            $table->string('chos');
            $table->string('grasa');
            $table->string('proteina');
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
        Schema::drop('diaries');
    }
}
