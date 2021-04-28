<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\homeworkController;
use App\Http\Controllers\lessonController;
use App\Http\Controllers\logInController;
use App\Http\Controllers\userController;
use App\Http\Controllers\videoController;
use App\Models\homework;
use Illuminate\Auth\Events\Login;
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

Route::post('logIn',[logInController::class,'authenticate']);

Route::get('/', homeController::class)->name('main');

Route::get('ingreso', [logInController::class,'index'])->name('login');

Route::get('logOut',[logInController::class,'logOut']);

Route::get('perfil',[userController::class])->name('perfil');

Route::view('ayuda','ayuda')->name('ayuda');

Route::get('clases',[lessonController::class])->name('clases.index');

Route::get('clases/{clase}',[lessonController::class])->name('clases.tablon');

Route::get('clases/{clase}/videos',[videoController::class])->name('clases.videos');

Route::get('clases/{clases}/videos/subir',[videoController::class])->name('clases.videos.upload');

Route::get('clases/{clase}/tareas',[homeController::class])->name('clases.tareas');

Route::get('clases/{clase}/tareas/crear',[homeworkController::class])->name('clases.tareas.assign');
