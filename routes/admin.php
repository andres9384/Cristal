<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\PublicacionController;
use Illuminate\Support\Facades\Route;



Route::get('', [HomeController::class,"index"] )->name("admin.home");
Route::resource('categorias', CategoryController::class)->names("admin.categories");
Route::resource('etiquetas', TagController::class)->names("admin.tags");
Route::resource('publicaciones', PostController::class)->names("admin.posts");