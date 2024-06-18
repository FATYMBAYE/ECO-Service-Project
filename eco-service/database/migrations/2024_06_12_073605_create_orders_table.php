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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_firstname');
            $table->string('customer_lastname');
            $table->decimal('total_amount', 10, 2);
            $table->text('shipping_address');
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::disableForeignKeyConstraints();
         Schema::dropIfExists('orders');
        // Réactiver les contraintes de clé étrangère
        Schema::enableForeignKeyConstraints();
       
    }
};
