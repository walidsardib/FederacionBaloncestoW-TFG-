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
        Schema::create('liga', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 250);
            $table->unsignedBigInteger('idTemporada')->nullable();
            $table->dateTime('fechaInicio')->nullable();
            $table->dateTime('fechaFin')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liga');
    }
};
