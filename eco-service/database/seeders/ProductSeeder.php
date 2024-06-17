<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Product::create([
            'image' => 'img/e5.jpg', // Chemin vers l'image
            'name' => 'Dentifrice solide ou en poudre',
            'description' => 'Dentifrice écologique sous forme solide disponible en poude également.',
            'price' => 30.00,
            'quantity' => 100,
        ]);

        Product::create([
            'image' => 'img/e2.jpg', // Chemin vers l'image
            'name' => 'Cotons-tiges réutilisables',
            'description' => 'Cotons-tiges écologiques réutilisables.',
            'price' => 26.40,
            'quantity' => 50,
        ]);

        Product::create([
            'image' => 'img/e1.jpg', // Chemin vers l'image
            'name' => 'Brosse à dents en bambou',
            'description' => 'Vos brosses à dents éco responables sont disponibles',
            'price' => 8.50,
            'quantity' => 50,
        ]);
        Product::create([
            'image' => 'img/e5.jpg', // Chemin vers l'image
            'name' => 'Dentifrice solide ou en poudre',
            'description' => 'Dentifrice écologique sous forme solide disponible en poude également.',
            'price' => 30.00,
            'quantity' => 100,
        ]);

        Product::create([
            'image' => 'img/e2.jpg', // Chemin vers l'image
            'name' => 'Cotons-tiges réutilisables',
            'description' => 'Cotons-tiges écologiques réutilisables.',
            'price' => 26.40,
            'quantity' => 50,
        ]);

        Product::create([
            'image' => 'img/e1.jpg', // Chemin vers l'image
            'name' => 'Brosse à dents en bambou',
            'description' => 'Vos brosses à dents éco responables sont disponibles',
            'price' => 8.50,
            'quantity' => 50,
        ]);
    }
}
