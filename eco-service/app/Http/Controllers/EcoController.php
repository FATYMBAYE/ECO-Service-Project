<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EcoController extends Controller
{
    public function index()
    {
        return view('accueil');
    }
    public function catalogue()
    {
        $products = Product::all();
        return view('catalogue', compact('products'));
    }
    public function panier()
    {
        return view('panier');
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('detail_product', compact('product'));
    }
}
