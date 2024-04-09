<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory // Creamos factory luego de crear el seeder
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [ 
            'name' => $this->faker->sentence(), // indicamos que el campo nombre se llene con oraciones
            'descripcion' => $this->faker->paragraph(), // indicamos que el campo nombre se llene con parrafos
            'slug' => $this->faker->slug(),
        ];
    }
}
