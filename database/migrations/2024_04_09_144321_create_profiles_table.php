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
        // relacion uno a uno
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('title',45);
            $table->text('biografia');
            $table->string('website',45);

            $table->unsignedBigInteger('user_id')->unique(); //llave foranea unica

            $table->foreign('user_id') // campo que sera la llave foranea
                  ->references('id') // renferencia al campo de la otra tabla
                  ->on('users') // indicamos la tabla referenciada
                  ->onDelete('cascade') // lo usamos para eliminar el perfil si el usuario se da de baja
                  ->onUpdate('cascade'); // si por alguna razon cambiara el id del usuario, tambien cambiaria aqui

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
