<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('picture');
            $table->text('content');
            $table->string('tags');
            $table->boolean('suscribe')->default(false);
            $table->boolean('premium')->default(false);
            $table->float('rank')->default(0);
            $table->boolean('for_patient')->default(true);
            $table->boolean('for_profesional')->default(true);
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
        Schema::drop('pages');
    }
}
