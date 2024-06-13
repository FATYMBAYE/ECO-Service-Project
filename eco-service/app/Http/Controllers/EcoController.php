<?php

namespace App\Http\Controllers;

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
        return view('catalogue');
    }
    public function panier()
    {
        return view('panier');
    }
}
