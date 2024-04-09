<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurso extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3', //forma de añadir reglas de validacion al mismo input
            'descripcion' => 'required',
            'slug' => 'required|unique:cursos'
        ];
    }

    public function messages(): array
    {
        return[
            'name.required'=> 'mensaje de error cambiado' // con es ta funcion personalizamos el mensaje, en este caso
                                                          // indicamos que de name, la validacion require, tendra el siguiente mensaje
        ];
    }
    
    public function attributes(): array 
    {
        return [
            'name'=> 'nombre completo', // con esta funcion personalizamos el nombre del atributo
                                        // (para ver funcionamiento, comentar la funcion de arriba)
        ];
    }
}