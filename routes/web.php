<?php

use App\Http\Controllers\fileController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\homeworkController;
use App\Http\Controllers\lessonController;
use App\Http\Controllers\logInController;
use App\Http\Controllers\postController;
use App\Http\Controllers\streamController;
use App\Http\Controllers\studentHomeworkController;
use App\Http\Controllers\teacherHomeworkController;
use App\Http\Controllers\userController;
use App\Http\Controllers\videoController;
use App\Listeners\postHomeworkListener;
use App\Models\file;
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

//main
Route::get('/', homeController::class)
    ->name('main')
    ->middleware('auth');

//Test
Route::post('prueba', [homeworkController::class, 'store'])->name('prueba');
Route::get('prueba', function () {
    return view('prueba');
});

//fileDownload

Route::get('archivo/{file}/descargar', [])->middleware('auth');

//Logout
Route::put('logOut', [logInController::class, 'logOut'])->name('logOut')->middleware('auth');

//Help
Route::view('ayuda', 'ayuda')->name('help')->middleware('auth');

//Perfil
Route::get('perfil', [userController::class, 'index'])->name('perfil')->middleware('auth');
Route::put('perfil', [userController::class, 'update'])->name('perfil.update')->middleware('auth');

//Classes
Route::get('clases', [lessonController::class, 'index'])->name('clases.index')->middleware('auth');
Route::get('clases/{lesson}', [lessonController::class, 'show'])->name('clases.show');

//Post
Route::post('clases/{lesson}/post/create', [postController::class, 'store'])->name('clases.post.store')->middleware('auth');
Route::delete('clases/post/{post}', [postController::class, 'destroy'])->name('clases.post.destroy')->middleware('auth');

//Streaming
Route::get('clases/{lesson}/stream',streamController::class)->name('clases.stream')->middleware('auth');
//viewStudents
Route::get('clases/{lesson}/alumnos', [lessonController::class, 'showStudents'])->middleware(['auth', 'can:clases.students.show'])->name('clases.students.show');
// Videos
Route::get('clases/{lesson}/videos', [videoController::class, 'index'])->name('clases.videos')->middleware('auth');
Route::get('clases/{lesson}/videos/subir', [videoController::class, 'create'])->middleware(['auth', 'can:clases.videos.create'])->name('clases.videos.create');
Route::get('clases/{lesson}/videos/{video}', [videoController::class, 'show'])->name('clases.videos.ver')->middleware('auth');

//Homeworks
Route::get('clases/{lesson}/tareas', [homeworkController::class, 'index'])->name('clases.tareas.index')->middleware('auth');
Route::get('clases/{lesson}/tareas/crear', [homeworkController::class, 'create'])->middleware(['auth', 'can:clases.tareas.create'])->name('clases.tareas.create');
Route::post('clases/{lesson}/tareas/crear', [homeworkController::class, 'store'])->middleware(['auth', 'can:clases.tareas.store'])->name('clases.tareas.store');
Route::get('clases/{lesson}/tareas/{homework}', [homeworkController::class, 'show'])->name('clases.tareas.show')->middleware('auth');
Route::get('clases/{lesson}/tareas/{homework}/editar', [homeworkController::class, 'edit'])->middleware(['auth', 'can:clases.tareas.edit'])->name('clases.tareas.edit');

//homework Student
Route::put('clases/{lesson}/tareas/{homework}', [studentHomeworkController::class, 'store'])->name('clases.tareas.subir')->middleware(['auth','can:clases.tareas.upload']);
//homeworks Teacher
Route::get('clases/{lesson}/tareas/{homework}/alumnos', [teacherHomeworkController::class, 'index'])->middleware(['auth','can:clases.tareas.students'])->name('clases.tareas.students');
Route::get('clases/{lesson}/tareas/{homework}/alumnos/{user}', [teacherHomeworkController::class, 'show'])->middleware(['auth','can:clases.tareas.students'])->name('clases.tareas.students.review');
Route::put('clases/{lesson}/tareas/{homework}/alumnos/{user}', [teacherHomeworkController::class, 'review'])->middleware(['auth','can:clases.tareas.students'])->name('clases.tareas.students.update');

//download
Route::get('archivo/descarga/{file}',[fileController::class,'downloadFile'])->name('file.download');
Route::get('video/descarga/{video}',[fileController::class,'downloadVideo'])->name('video.download');