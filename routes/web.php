<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\homeworkController;
use App\Http\Controllers\lessonController;
use App\Http\Controllers\logInController;
use App\Http\Controllers\userController;
use App\Http\Controllers\videoController;
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

Route::post('logIn',[logInController::class,'authenticate'])->name('authenticate');

Route::get('/', homeController::class)
                ->name('main')
                ->middleware('auth');

Route::get('ingreso', [logInController::class,'index'])
                ->name('login');

Route::get('logOut',[logInController::class,'logOut']);

Route::get('perfil',[userController::class , 'index'])->name('perfil');

Route::view('ayuda','ayuda')->name('help');

Route::get('clases',[lessonController::class, 'index'])->name('clases.index');

Route::get('clases/{lesson}',[lessonController::class,'show'])->name('clases.show');

Route::get('clases/{lesson}/videos',[videoController::class,'index'])->name('clases.videos');

Route::get('clases/{lesson}/videos/subir',[videoController::class , 'create'])->name('clases.videos.upload');

Route::get('clases/{lesson}/videos/{video}',[videoController::class,'show'])->name('clases.videos.ver');

Route::get('clases/{lesson}/tareas',[homeworkController::class,'index'])->name('clases.tareas');

Route::get('clases/{lesson}/tareas/subir',[homeworkController::class,'create'])->name('clases.tareas.create');

Route::get('clases/{lesson}/tareas/{homework}',[homeworkController::class,'show'])->name('clases.tareas.show');

Route::get('clases/{lesson}/tareas/{homework}/editar',[homeworkController::class,'edit'])->name('clases.tareas.edit');