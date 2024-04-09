<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = ['name','descripcion','slug']; // Campos que se llenaran cuando se ejecute el metodo Store
                                                  // A esto se le llama asignacion masiva y evita exponer campos
                                                  // de la base de datos que el usuario no debe manipular bajo ninguna circunstancia

    // protected $guarded = ['status']; // Con este metodo, especificamos el campo que debe ignorar, de manera que permita
                                        // la modificacion de los campos restantes

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
