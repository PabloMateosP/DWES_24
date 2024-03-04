<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 35);
            $table->string('apellidoos', 45);
            $table->date('fecha_nacimiento');
            $table->char('telefono', 13)->nullable(false);
            $table->string('poblacion', 20);
            $table->char('dni', 9)->unique()->comment('DNI del alumno')->nullable(false);
            $table->string('email', 35)->unique()->comment('Email del alumno');
            $table->unsignedBigInteger('curso_id'); // Curso_id es una convención 
            $table->timestamps();

            // restricciones
            $table->foreign('curso_id')
                ->references('id')
                ->on('cursos')
                ->restrictOnDelete()
                ->restrictOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
