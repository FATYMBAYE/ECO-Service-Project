<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/menu', [EcoController::class, 'menu'])->name('menu');
Route::get('/accueil', [EcoController::class, 'index'])->name('accueil');
Route::get('/accueilpro', [EcoController::class, 'accueilpro'])->name('accueilpro');
Route::get('/catalogue', [EcoController::class, 'catalogue'])->name('catalogue');
Route::get('/catalogue_services_pro', [EcoController::class, 'showcat'])->name('cataloguepro');
Route::get('/product/{id}', [EcoController::class, 'show'])->name('detailprod');
Route::post('/process-payment', [EcoController::class, 'processPayment'])->name('process-payment');
Route::get('/panier', [EcoController::class, 'panier'])->name('panier');
Route::get('/formulaire', [EcoController::class, 'form'])->name('formulaire');
Route::get('/formulairestore', [EcoController::class, 'formstore'])->name('formulaire.store');