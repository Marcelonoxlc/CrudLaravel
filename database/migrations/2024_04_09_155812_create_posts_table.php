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
        // Relacion uno a muchos
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->text('body');

            $table->unsignedBigInteger('user_id')->nullable(); // si se elimina la categoria no debe afectar a las otras tablas
            $table->unsignedBigInteger('categoria_id')->nullable(); // por lo que estas llaves foraneas permiten valores nulos

            $table->foreign('user_id') 
                  ->references('id')->on('users')
                  ->onDelete('set null'); // En caso de eliminarse la categoria dejara el valor como nulo

            $table->foreign('categoria_id')
                  ->references('id')->on('categorias')
                  ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
