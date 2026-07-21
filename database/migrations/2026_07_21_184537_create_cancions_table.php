<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('canciones', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('titulo', 150);
            $table->string('artista', 150);
            $table->string('album', 150)->nullable();
            $table->string('genero', 80);
            $table->string('compositor', 150)->nullable();
            $table->string('sello_discografico', 150)->nullable();
            $table->date('fecha_lanzamiento')->nullable();
            $table->unsignedInteger('duracion_segundos');
            $table->unsignedSmallInteger('numero_pista')->nullable();
            $table->string('idioma', 50)->default('Español');
            $table->unsignedSmallInteger('bpm')->nullable();
            $table->string('tonalidad', 30)->nullable();
            $table->decimal('precio', 10, 2)->default(0);
            $table->decimal('calificacion', 3, 1)->default(0);
            $table->unsignedBigInteger('reproducciones')->default(0);
            $table->boolean('explicita')->default(false);
            $table->boolean('disponible')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('canciones');
    }
};