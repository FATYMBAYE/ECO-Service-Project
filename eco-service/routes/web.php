<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/accueil', [EcoController::class, 'index'])->name('accueil');
Route::get('/catalogue', [EcoController::class, 'catalogue'])->name('catalogue');
Route::get('/product/{id}', [EcoController::class, 'show'])->name('detailprod');
Route::post('/process-payment', [EcoController::class, 'processPayment'])->name('process-payment');
Route::get('/payment-success', [EcoController::class, 'paymentSuccess'])->name('payment-success');
Route::get('/payment-cancel', [EcoController::class, 'paymentCancel'])->name('payment-cancel');
Route::get('/panier', [EcoController::class, 'panier'])->name('panier');