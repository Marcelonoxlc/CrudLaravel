<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder // El seeder lo creamos para que cree datos de prueba en la tabla
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Curso::factory(20)->create(); // definimos la cantidad de registros
    }
}
