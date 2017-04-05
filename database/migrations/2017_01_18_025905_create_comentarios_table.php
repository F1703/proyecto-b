<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contenido');
            $table->integer('user_id')->unsigned();
            $table->integer('publicacion_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->ondelete('cascade');
            $table->foreign('publicacion_id')->references('id')->on('publicacions')->ondelete('cascade');
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
        Schema::drop('comentarios');
    }
}
