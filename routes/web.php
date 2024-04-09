<?php

use App\Http\Controllers\ContactanosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

//-------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------

Route::get('/', HomeController::class)->name('home');

// Route::resource('dashboard', CursoController::class); // Con este metodo agrupamos el crud creado abajo
//                                                       // las variables curso, con este metodo debiesen llamarse dashboar
//                                                       // para que laravel pueda trabajar con su convencion
//                                                       // tenerlo en cuenta al iniciar un proyecto

//-------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------

Route::get('dashboard', [CursoController::class,'index'])->name('dashboard.index'); // Se llama al controlador e indica el metodo a usar

Route::get('dashboard/create', [CursoController::class, 'create'])->name('dashboard.create');

Route::post('dashboard', [CursoController::class,'store'])->name('dashboard.store');

Route::get('dashboard/{curso}', [CursoController::class, 'show'])->name('dashboard.show');

Route::get('dashboard/{curso}/edit', [CursoController::class, 'edit'])->name('dashboard.edit');

Route::put('dashboard/{curso}',[CursoController::class,'update'])->name('dashboard.update');

Route::delete('dashboard/{curso}',[CursoController::class,'destroy'])->name('dashboard.destroy');

//-------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------

// Route::get('contactanos', function(){

//     Mail::to('marcelonoxlc@gmail.com')
//     ->send(new ContactanosMailable);
//     return "Mensaje enviado";

// })->name('contactanos');

Route::get('contactanos', [ContactanosController::class,'index'])->name('contactanos.index');

Route::post('contactanos', [ContactanosController::class,'store'])->name('contactanos.store');


//-------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------

Route::view('nosotros','nosotros')->name('nosotros'); // ruta a paginas estaticas

//-------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------

// Route::get('/', function () {   // el primer slash representa la ruta de la pagina principal
//     return view('welcome');
// });

// Route::get('curso', function () { //Curso es el nombre de la variable que servira como ruta
//     return "Este es el curso de laravel";
// });

// Route::get('curso/ejemplo', function () { // Se debe anteponer la ruta para no entrar en conflicto con rutas que usan variables
//     return "Este es el curso de laravel mostrando un ejemplo";
// });

// Route::get('curso/{variable}', function ($variable) {
//     return "Uso de variable a traves de la url: $variable"; // Escribe al final de la url una palabra para ver el funcionamiento
// });

// Route::get('curso/{variable}/{variable2}', function ($variable,$variable2) {
//     return "Primera palabra: $variable , Segunda palabra: $variable2"; // Mismo concepto usando 2 variables
// });

//-------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------