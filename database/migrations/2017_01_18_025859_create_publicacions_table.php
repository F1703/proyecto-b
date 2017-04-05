<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('intro',500);
            $table->string('cuerpo',5000);
            $table->string('slug');
            $table->integer('user_id')->unsigned();
            $table->integer('categoria_id')->unsigned();
            $table->integer('materia_id')->unsigned();
            $table->integer('archivo_id')->unsigned()->nullable();

            $table->foreign('user_id')->references('id')->on('users')->ondelete();
            $table->foreign('categoria_id')->references('id')->on('categorias')->ondelete();
            $table->foreign('materia_id')->references('id')->on('materias')->ondelete();
            $table->foreign('archivo_id')->references('id')->on('archivos')->ondelete();

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
        Schema::drop('publicacions');
    }
}
