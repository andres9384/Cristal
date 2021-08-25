<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Andmin\RolController;
use App\Http\Controllers\PublicacionController;
use Illuminate\Support\Facades\Route;



Route::get('', [HomeController::class,"index"] )->Middleware("can:admin.home")->name("admin.home");
Route::resource('users', UserController::class)->only(["index","edit","update"])->names("admin.users");
Route::resource('roles', RolController::class)->names("admin.rol");
Route::resource('categorias', CategoryController::class)->except("show")->names("admin.categories");
Route::resource('etiquetas', TagController::class)->except("show")->names("admin.tags");
Route::resource('publicaciones', PostController::class)->except("show")->names("admin.posts");