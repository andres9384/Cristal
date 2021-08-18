<?php

use App\Http\Controllers\PublicacionController;
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

Route::get('/', [PublicacionController::class,'index'])->name("post.index");

Route::get('publicacion/{publicacion}', [PublicacionController::class,"show"])->name("post.show");

Route::get('categoria/{category}', [PublicacionController::class,"category"])->name("post.category");

Route::get('etiquetas/{tag}', [PublicacionController::class,"tag"])->name("post.tag");

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
