<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/accueil', [EcoController::class, 'index'])->name('accueil');
Route::get('/catalogue', [EcoController::class, 'catalogue'])->name('catalogue');
Route::get('/panier', [EcoController::class, 'panier'])->name('panier');