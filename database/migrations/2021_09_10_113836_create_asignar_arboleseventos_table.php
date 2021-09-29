<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignarArboleseventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignar_arboleseventos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('datos_arbol_id');
            $table->unsignedBigInteger('evento_id');
            $table->timestamps();
        });

        Schema::table('asignar_arboleseventos', function (Blueprint $table) {
            $table->foreign('datos_arbol_id')->references('id')->on('datos_arbols')->onDelete('cascade');
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignar_arboleseventos');
    }
}
