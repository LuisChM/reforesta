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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('detalleEvento/{id}', 'HomeController@show')->name('home');

Route::resource('datosArbol', 'DatosArbolController')->names('datosArbols');

Route::resource('evento', 'EventoController')->names('eventos');