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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name', 35);
            $table->string('last_name', 45);
            $table->date('birth_date');
            $table->char('phone', 20)->nullable(false);
            $table->string('city', 40);
            $table->char('dni', 9)->unique()->nullable(false);
            $table->string('email', 35)->unique()->comment('Email del alumno');
            $table->unsignedBigInteger('course_id'); // Curso_id es una convención 
            $table->timestamps();

            // restricciones
            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->restrictOnDelete()
                ->restrictOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
