<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcoController;
use App\Http\Controllers\ProductController;

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
Route::get('/panier', [EcoController::class, 'panier'])->name('panier');
Route::get('/register', [AdminController::class, 'register'])->name('registration');
Route::post('/register', [AdminController::class, 'handleRegistration'])->name('registration');
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'handleLogin'])->name('login');


Route::middleware(['auth'])->group(
    function () {
        Route::get('/list-contact', [EcoController::class, 'affichercontacts'])->name('listes-devis');
        Route::get('/contact/{id}', [EcoController::class, 'deletequotes'])->name('quote.delete');
        //route admin
        route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        Route::resource('/products', ProductController::class);
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    }
);
