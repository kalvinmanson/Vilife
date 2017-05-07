<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('profesional_id');
            $table->float('peso', 8, 1);
            $table->integer('estatura');
            $table->float('imc', 8, 1);
            $table->string('actividad_fisica');
            $table->float('cir_cintura', 8, 1);
            $table->float('cir_brazo', 8, 1);
            $table->float('pl_biceps', 8, 1);
            $table->float('pl_triceps', 8, 1);
            $table->float('pl_subescapular', 8, 1);
            $table->float('pl_suprailiaco', 8, 1);
            $table->float('pl_abdominal', 8, 1);
            $table->float('pl_muslo', 8, 1);
            $table->float('pl_pantorrilla', 8, 1);
            $table->text('complementos');
            $table->text('aversiones');
            $table->string('diagnostico');
            $table->text('concepto');
            $table->text('manejo');
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
        Schema::drop('profiles');
    }
}
