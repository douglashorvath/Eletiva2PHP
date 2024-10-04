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
        Schema::create('events', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->string('name'); // Nome do evento
            $table->text('description'); // Descrição do evento
            $table->date('date'); // Data do evento
            $table->time('time'); // Hora do evento
            $table->integer('capacity'); // Capacidade do evento
            $table->timestamps(); // Created_at e Updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
