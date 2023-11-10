<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profesor__estudiantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('Profesor_Id')->unsigned();
            $table->foreign('Profesor_Id')->references('id')->on('Profesors')->onDelete('cascade');
            $table->bigInteger('Estudiante_Id')->unsigned();
            $table->foreign('Estudiante_Id')->references('id')->on('Estudiantes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesor__estudiantes');
    }
};
