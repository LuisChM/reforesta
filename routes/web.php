<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\DatosArbolController;

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


Route::get('storage:link', function () {
    Artisan::call('storage:link');
});

Auth::routes(['register' => false]);
// Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('detalleEvento/{id}', 'HomeController@eventoActual')->name('home');
Route::get('eventoPasado', 'HomeController@eventoPasado')->name('home');
Route::get('nuestroArbol', 'HomeController@nuestroArbol')->name('home');

Route::resource('datosArbol', 'DatosArbolController')->names('datosArbols');
Route::resource('historialEvento', 'HistorialEventosController')->names('historialEventos');
Route::resource('contador', 'ContadorController')->names('contadors');
Route::resource('patrocinador', 'PatrocinadorController')->names('patrocinadors');
Route::resource('paginaPrincipal', 'PaginaprincipalController')->names('paginaPrincipals');

Route::resource('evento', 'EventoController')->names('eventos');


