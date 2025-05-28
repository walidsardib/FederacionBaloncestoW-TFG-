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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 250);
            $table->integer('pJugados')->default(0);
            $table->integer('pGanados')->default(0);
            $table->integer('pPerdidos')->default(0);
            $table->integer('puntosFinalizados')->default(0);
            $table->integer('puntosContra')->default(0);
            $table->integer('pts')->default(0);
            $table->string('entrenador', 250)->nullable();
            $table->string('pabellon', 250)->nullable();
            $table->string('ciudad', 250)->nullable();
            $table->string('escudo', 250)->nullable();
            $table->unsignedBigInteger('idLiga')->nullable();
            $table->foreign('idLiga')->references('id')->on('liga')->onDelete('set null');
            $table->unsignedBigInteger('idClub')->nullable();
            $table->foreign('idClub')->references('id')->on('clubes')->onDelete('set null');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
