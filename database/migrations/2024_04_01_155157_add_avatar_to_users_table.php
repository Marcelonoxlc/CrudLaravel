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
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable()->after('email'); // indicamos el campo que queremos añadir a la tabla, 
                                                                  // especificamos un valor nulo
                                                                  // usamos after para indicar luego de que campo queremos
                                                                  // añadir el nuevo campo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar'); // especificapos el campo que deseamos eliminar
        });
    }
};
