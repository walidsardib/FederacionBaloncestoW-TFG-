<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('estadisticas_partido', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idJugador');
            $table->unsignedBigInteger('idPartido');
            $table->integer('minutosJugados')->default(0);
            $table->integer('puntos')->default(0);
            $table->integer('rebotes')->default(0);
            $table->integer('asistencias')->default(0);
            $table->integer('intentos2P')->default(0);
            $table->integer('aciertos2P')->default(0);
            $table->integer('intentos3P')->default(0);
            $table->integer('aciertos3P')->default(0);
            $table->integer('intentosTL')->default(0);
            $table->integer('aciertosTL')->default(0);
            $table->integer('robos')->default(0);
            $table->foreign('idJugador')->references('id')->on('jugadores');
            $table->foreign('idPartido')->references('id')->on('partidos');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estadisticas_partido');
    }
};
