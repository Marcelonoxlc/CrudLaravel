<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCurso;
use App\Http\Requests\UpdateCurso;
use App\Models\Curso; // Indicamos el modelo que usara el controlador
use Illuminate\Http\Request;

class CursoController extends Controller
{
    //-------------------------------------------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------------------------------------------

    public function index(){  //Index se denomina al metodo encargado de mostrar la pagina principal

        // $cursos = Curso::all(); // metodo para recuperar todos los cursos y luego en vistas decidir con que operar

        $cursos = Curso::paginate(); // De esta forma llamaremos los primeros 15 registros de cada campo
                                       // en la url al final de la cadena de direccion agregar ?page=2
                                       // esto permite pasar a los siguientes registros                               
        
        return view('cursos.index', compact('cursos')); // Retorna la vista, entra a la carpeta cursos y llama al archivo index
    }

    //-------------------------------------------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------------------------------------------

    public function create(){  //Create se denomina al metodo que muestra una pagina donde el usuario crea algo 
        return view('cursos.create');
    }

    //-------------------------------------------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------------------------------------------

    public function store(StoreCurso $request){

        // $curso = new Curso();

        // $curso->name = $request->name;
        // $curso->descripcion = $request->descripcion;

        // $curso->save();

        $curso = Curso::create($request->all()); // Esto es lo mismo que el codigo comentado de arriba, la diferencia
                                                  // es que ignorara los campos que no esten determinados en el modelo  

        return redirect()->route('dashboard.show', compact('curso'));
    }

    //-------------------------------------------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------------------------------------------

    public function show(Curso $curso){  //Show se denomina al metodo encargado de mostrar un elemento especifico

        return view('cursos.show',compact('curso'));
    }

    //-------------------------------------------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------------------------------------------

    public function edit(Curso $curso){
        return view('cursos.edit', compact('curso')); 
    }

    //-------------------------------------------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------------------------------------------

    public function update(UpdateCurso $request, Curso $curso){

        $request->validate([
            'slug' => 'required|unique:cursos,slug,'.$curso->id
        ]);

        $curso->update($request->all());




        return view('cursos.show',compact('curso'));
    }

    //-------------------------------------------------------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------------------------------------------------------

    public function destroy(Curso $curso){
        $curso->delete();

        return redirect()->route(('dashboard.index'));
    }
}
