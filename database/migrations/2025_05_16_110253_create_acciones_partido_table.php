<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('acciones_partido', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idPartido');
            $table->unsignedBigInteger('idJugador');
            $table->unsignedBigInteger('idEquipo');
            $table->string('accion'); // Ejemplo: '2P', '3P', 'TL', 'REBOTE', etc.
            $table->integer('valor')->nullable(); // Ejemplo: 2, 3, 1, etc.
            $table->timestamps();

            $table->foreign('idPartido')->references('id')->on('partidos')->onDelete('cascade');
            $table->foreign('idJugador')->references('id')->on('jugadores')->onDelete('cascade');
            $table->foreign('idEquipo')->references('id')->on('equipos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acciones_partido');
    }
};
