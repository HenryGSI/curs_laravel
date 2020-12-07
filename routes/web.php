<?php

use Illuminate\Support\Facades\Route; //para personalizar rutas tipo editar y crear además de editar /App/Providers/AppServiceProvider
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MessageController; //si queremos usar un controllador sin usar continuamente su ruta, tenemos que importarlo

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//App::setLocale('es'); //si queremos canviar el idioma

Route::view('/', 'home')->name('home');
Route::view('/quienes-somos', 'about')->name('about');
//Route::get('/portfolio', 'App\Http\Controllers\ProjectController')->name('portfolio'); //el nombre del controllador que invocaremos



//Route::resource('projects', ProjectController::class);

//siq queremos personalizar la base de la ruta, y despues ponerle un alias o nombre diferente, le tenemos que
//especificar el nombre de la ruta, y el del parametro
Route::resource('portafolio', ProjectController::class)
    ->names('projects')
    ->parameters(['portafolio' => 'project']);

/*

Route::get('/portafolio', [ProjectController::class, 'index'])->name('projects.index'); //el nombre del controllador que invocaremos
Route::get('/portafolio/crear', [ProjectController::class, 'create'])->name('projects.create');

Route::get('/portafolio/{project}/editar', [ProjectController::class, 'edit'])->name('projects.edit');
Route::patch('/portafolio/{project}', [ProjectController::class, 'update'])->name('projects.update');

Route::post('/portafolio', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/portafolio/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::delete('/portafolio/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');



*/


Route::view('/contacto', 'contact')->name('contact');
Route::post('/contact', [MessageController::class, 'store'])->name('messages.store'); //metodo @store para que guarde los datos
//Route::post('/contact', 'App\Http\Controllers\MessagesController@store')->name('contact'); //metodo @store para que guarde los datos




//Para generar una ruta de un metodo de un controlador concreto
//Route::get('/portfoliob', 'App\Http\Controllers\PortfolioBController@index')->name('portfoliob'); //el nombre del controllador que invocaremos y el metodo que llamamos

//Para generar todas las rutas de un Controlador Resource

Route::resource('projectoooos','App\Http\Controllers\PortfolioBController');

/*
|        | GET|HEAD  | projects                | projects.index   | App\Http\Controllers\PortfolioBController@index   | web        |
|        | POST      | projects                | projects.store   | App\Http\Controllers\PortfolioBController@store   | web        |
|        | GET|HEAD  | projects/create         | projects.create  | App\Http\Controllers\PortfolioBController@create  | web        |
|        | GET|HEAD  | projects/{project}      | projects.show    | App\Http\Controllers\PortfolioBController@show    | web        |
|        | PUT|PATCH | projects/{project}      | projects.update  | App\Http\Controllers\PortfolioBController@update  | web        |
|        | DELETE    | projects/{project}      | projects.destroy | App\Http\Controllers\PortfolioBController@destroy | web        |
|        | GET|HEAD  | projects/{project}/edit | projects.edit    | App\Http\Controllers\PortfolioBController@edit    | web        |

*/

/*Para personalizar para que salga asi

|        | GET|HEAD  | projects/crear                 | projects.create     | App\Http\Controllers\PortfolioBController@create    | web        |
|        | GET|HEAD  | projects/{project}/editar      | projects.edit       | App\Http\Controllers\PortfolioBController@edit      | web        |

Vamos al /app/Providers/AppServiceProvider.php y en el metodo boot le pasamos un array con los nuevos valores

*/

//Crear solo las rutas de los metodos que yo elija
Route::resource('proyectos','App\Http\Controllers\PortfolioBController')->only(['index','show']);

/*
|        | GET|HEAD  | proyectos               | proyectos.index  | App\Http\Controllers\PortfolioBController@index   | web        |
|        | GET|HEAD  | proyectos/{proyecto}    | proyectos.show   | App\Http\Controllers\PortfolioBController@show    | web        |
*/

//Crear solo de todas las rutas excepto los metodos que yo especifico
//Route::resource('proyectosC','App\Http\Controllers\PortfolioBController')->except(['index','show']);

/*
|        | POST      | proyectosC                   | proyectosC.store   | App\Http\Controllers\PortfolioBController@store   | web        |
|        | GET|HEAD  | proyectosC/create            | proyectosC.create  | App\Http\Controllers\PortfolioBController@create  | web        |
|        | PUT|PATCH | proyectosC/{proyectosC}      | proyectosC.update  | App\Http\Controllers\PortfolioBController@update  | web        |
|        | DELETE    | proyectosC/{proyectosC}      | proyectosC.destroy | App\Http\Controllers\PortfolioBController@destroy | web        |
|        | GET|HEAD  | proyectosC/{proyectosC}/edit | proyectosC.edit    | App\Http\Controllers\PortfolioBController@edit    | web        |
*/

//Api hace lo mismo que Resource pero en este caso no crea los metodos create y edit
Route::apiResource('projectosApi','App\Http\Controllers\PortfolioApiController');

/*
|        | POST      | projectsApi                  | projectsApi.store   | App\Http\Controllers\PortfolioApiController@store   | web        |
|        | GET|HEAD  | projectsApi                  | projectsApi.index   | App\Http\Controllers\PortfolioApiController@index   | web        |
|        | DELETE    | projectsApi/{projectsApi}    | projectsApi.destroy | App\Http\Controllers\PortfolioApiController@destroy | web        |
|        | PUT|PATCH | projectsApi/{projectsApi}    | projectsApi.update  | App\Http\Controllers\PortfolioApiController@update  | web        |
|        | GET|HEAD  | projectsApi/{projectsApi}    | projectsApi.show    | App\Http\Controllers\PortfolioApiController@show    | web        |
*/

Route::get('/aaa', function (){

    $nombre = "Jorge";

    //devolvemos la vista home.blade.php que hay en /resources/views/

    //para pasar una variable lo podemos hacer de estas 3 formas
    //return view('home')->with('nombre', $nombre);
    //return view('home')->with(['nombre' => $nombre]);
    return view('home', compact('nombre'));

})->name('home_old');

//forma alternativa de llamar a una vista con un ruta, para paginas senzillas tipo Aviso legal, privacidad
//Route::view('/', 'home');
//Route::view('/', 'home')->name('home');

Route::get('contacto_old', function (){
    return 'Contacto';
})->name('contacto'); //ponemos un nombre a la ruta y asi la podemos llamar con route()






// el interrogante ? en el parametro es para que sea opcional
Route::get('saludo/{nombre?}', function($nombre = "Invitado"){
    return 'Hello '.$nombre;
});

Auth::routes(['register' => false]);
