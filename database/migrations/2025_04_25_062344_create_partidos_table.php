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
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idLocal');
            $table->unsignedBigInteger('idVisitante');
            $table->integer('ptsLocal')->default(0);
            $table->integer('ptsVisitante')->default(0);
            $table->dateTime('fecha');
            $table->time('hora');
            $table->boolean('finalizado')->default(0);
            $table->unsignedBigInteger('idJornada');
            $table->foreign('idLocal')->references('id')->on('equipos');
            $table->foreign('idVisitante')->references('id')->on('equipos');
            $table->foreign('idJornada')->references('id')->on('jornadas');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidos');
    }
};
