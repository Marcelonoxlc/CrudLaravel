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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); //(metodo id) Int, Unsigned(sin signo), Autoincremental
            $table->string('name'); // (metodo string) Varchar 255 
            $table->string('email')->unique(); // (unique) No puede repetirse en la base de datos
            $table->timestamp('email_verified_at')->nullable(); //(timestamp) Guarda fechas , (nullable) el campo puede quedar vario
            $table->string('password');
            $table->rememberToken(); //(rememberTokern) Almacena la sesion abierta del usuario
            $table->timestamps(); // Crea dos campos, Create y Update, el primero es la fecha de creacion, el segundo la fecha
                                  // de cuando se actualiza un registro
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable(); 
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
