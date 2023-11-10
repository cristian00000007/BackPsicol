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
        Schema::create('estudiante__asignaturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('Asignatura_Id')->unsigned();
            $table->foreign('Asignatura_Id')->references('id')->on('Asignaturas')->onDelete('cascade');
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
        Schema::dropIfExists('estudiante__asignaturas');
    }
};
