<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactoController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('post',PostController::class);

Route::get('post/create',[PostController::class,'create'])->name('post.create');

Route::post('post/create',[PostController::class,'store'])->name('post.store');

Route::get('post/{slug}',[CursoController::class,'show'])->name('curso.show');

Route::get('post/edit/{post}',[PostController::class,'edit'])->name('post.edit');

Route::put('post/edit/{post}',[PostController::class,'update'])->name('post.update');

Route::delete('post/{post}',[PostController::class,'destroy'])->name('post.destroy');

Route::get('contacto',[ContactoController::class,'index'])->name('contacto.index');

Route::post('contacto',[ContactoController::class,'store'])->name('contacto.store');
