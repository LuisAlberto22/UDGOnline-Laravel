<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\homeworkController;
use App\Http\Controllers\lessonController;
use App\Http\Controllers\logInController;
use App\Http\Controllers\postController;
use App\Http\Controllers\userController;
use App\Http\Controllers\videoController;
use App\Listeners\postHomeworkListener;
use App\Models\homework;
use App\Models\post;
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

//Login
Route::post('logIn', [logInController::class, 'authenticate'])->name('authenticate');
Route::get('ingreso', [logInController::class, 'index'])
    ->name('login');

//Test
Route::post('prueba', [homeworkController::class, 'store'])->name('prueba');
Route::get('/', homeController::class)
    ->name('main')
    ->middleware('auth');
Route::get('prueba', function () {
    return view('prueba');
});

//Logout
Route::put('logOut', [logInController::class, 'logOut'])->name('logOut');

//Help
Route::view('ayuda', 'ayuda')->name('help');

//Perfil
Route::get('perfil', [userController::class, 'index'])->name('perfil');
Route::put('perfil', [userController::class, 'update'])->name('perfil.update');

//Classes
Route::get('clases', [lessonController::class, 'index'])->name('clases.index');
Route::get('clases/{lesson}', [lessonController::class, 'show'])->name('clases.show');

//Post
Route::post('clases/{lesson}/post/create', [postController::class, 'store'])->name('clases.post.store');
Route::delete('clases/post/{post}', [postController::class, 'destroy'])->name('clases.post.destroy');

//Streaming
Route::get('clases/{lesson}/stream', function ($lesson) {
    return view('clases.streaming.stream', compact('lesson'));
})->name('clases.stream');

// Videos
Route::get('clases/{lesson}/videos', [videoController::class, 'index'])->name('clases.videos');
Route::get('clases/{lesson}/videos/subir', [videoController::class, 'create'])->name('clases.videos.create');
Route::get('clases/{lesson}/videos/{video}', [videoController::class, 'show'])->name('clases.videos.ver');

//Homeworks
Route::get('clases/{lesson}/tareas', [homeworkController::class, 'index'])->name('clases.tareas.index');
Route::get('clases/{lesson}/tareas/crear', [homeworkController::class, 'create'])->name('clases.tareas.create');
Route::post('clases/{lesson}/tareas/crear', [homeworkController::class, 'store'])->name('clases.tareas.store');
Route::get('clases/{lesson}/tareas/{homework}', [homeworkController::class, 'show'])->name('clases.tareas.show');
Route::get('clases/{lesson}/tareas/{homework}/editar', [homeworkController::class, 'edit'])->name('clases.tareas.edit');
