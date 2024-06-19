<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcoController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/accueil', [EcoController::class, 'index'])->name('accueil');
Route::get('/catalogue', [EcoController::class, 'catalogue'])->name('catalogue');
Route::get('/product/{id}', [EcoController::class, 'show'])->name('detailprod');
Route::get('/panier', [EcoController::class, 'panier'])->name('panier');

//route admin

route::get('/admin',[AdminController::class,'index'])->name('admin.index');
Route::resource('/products', ProductController::class);