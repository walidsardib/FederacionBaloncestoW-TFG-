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
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 250);
            $table->string('foto', 250)->nullable();
            $table->integer('dorsal');
            $table->unsignedBigInteger('idEquipo');
            $table->integer('pJugados')->default(0);
            $table->integer('mins')->default(0);
            $table->integer('minsPP')->default(0);
            $table->integer('pts')->default(0);
            $table->integer('ptsPP')->default(0);
            $table->integer('rebotes')->default(0);
            $table->integer('asistencias')->default(0);
            $table->integer('intentos2P')->default(0);
            $table->integer('aciertos2P')->default(0);
            $table->integer('intentos3P')->default(0);
            $table->integer('aciertos3P')->default(0);
            $table->integer('intentosTL')->default(0);
            $table->integer('aciertosTL')->default(0);
            $table->integer('robos')->default(0);
            $table->foreign('idEquipo')->references('id')->on('equipos');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jugadores');
    }
};
