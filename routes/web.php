<?php

use App\Http\Controllers\logInController;
use Illuminate\Support\Facades\Route;

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

Route::post('ingreso',[logInController::class,'authenticate'])->name('login');

Route::get('/', function () {
    return view('main');
})->name('main');

Route::get('ingreso', function () {
    return view('ingreso');
});

Route::view('ayuda','ayuda')->name('ayuda');

Route::get('clases',function(){
    return view('clases.clases');
})->name('clases.index');

Route::get('clases/{clase}',function(){
    return view('clases.index');
})->name('clases.tablon');
Route::get('clases/{clase}/videos',function(){
    return view('clases.videos.videos');
});
Route::get('clases/{clases}/videos/subir',function(){
    return view('clases.clases');
});
Route::get('clases/{clase}/tareas',function(){
    return view('clases.tareas.tareas');
});
Route::get('clases/{clase}/tareas/crear',function(){
    return view('clases.clases');
});
Route::get('perfil',function (){
    return view('usuario.perfil');
})->name('perfil');