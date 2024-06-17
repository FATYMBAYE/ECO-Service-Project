<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name'); // Champ pour le nom du produit
            $table->text('description')->nullable(); // Champ pour la description (optionnel)
            $table->decimal('price', 10, 2); // Champ pour le prix (10 chiffres max, 2 décimales)
            $table->integer('quantity')->default(0); // Champ pour la quantité en stock, par défaut à 0
            $table->timestamps(); // Champs pour les dates de création et de mise à jour
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
