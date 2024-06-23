<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Orders_Item;
use App\Models\Quote;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Stripe\Stripe;
use Stripe\Charge;

class EcoController extends Controller
{
    
    public function menu()
    {
        return view('menu');
    }
    public function index()
    {
        return view('accueil');
    }
    public function accueilpro()
    {
        return view('accueilpro');
    }
    public function showcat()
    {
        return view('catalogue_services');
    }
    public function catalogue()
    {
        $products = Product::all();
        return view('catalogue', compact('products'));
    }
    public function panier()
    {
        $stripeKey = config('services.stripe.key');
        return view('panier', compact('stripeKey'));
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('detail_product', compact('product'));
    }
    public function deletequotes($id)
    {
        // Supprimez l'œuvre en utilisant l'ID
        $quote = Quote::findOrFail($id);
        $quote->delete();

        // Redirigez l'utilisateur vers la liste des œuvres ou une autre page de votre choix
        return redirect()->route('listes-devis');
    }
    public function affichercontacts()
    {
        $quotes = Quote::all();

        return view('listes-devis', compact('quotes'));
    }
    public function processPayment(Request $request)
    {
        // Valider les données du formulaire et enregistrer les détails de la commande dans la base de données
        $request->validate([
            'customer_firstname' => 'required|string|max:255',
            'customer_lastname' => 'required|string|max:255',
            'shipping_address' => 'required|string|max:255',
            'total_amount' => 'required|numeric',
            'cart_items' => 'required|json',
        ]);

        // Enregistrer la commande dans la base de données
        $order = new Order();
        $order->customer_firstname = $request->customer_firstname;
        $order->customer_lastname = $request->customer_lastname;
        $order->shipping_address = $request->shipping_address;
        $order->total_amount = $request->total_amount;
        $order->status = 'pending';
        $order->save();

        // Enregistrer les articles de commande dans la base de données
        $cartItems = json_decode($request->cart_items, true);
        foreach ($cartItems as $item) {
            $order_Item = new Orders_Item();
            $order_Item->order_id = $order->id;
            $order_Item->product_id = $item['id'];
            $order_Item->quantity = $item['quantity'];
            $order_Item->price = $item['price'];
            $order_Item->save();
        }

        // Processus de paiement avec Stripe
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $charge = Charge::create([
                'amount' => $request->total_amount * 100, // Le montant doit être en cents
                'currency' => 'eur',
                'source' => $request->stripeToken,
                'description' => 'Paiement pour la commande #' . $order->id,
            ]);

            // Mettre à jour le statut de la commande à "completed"
            $order->status = 'completed';
            $order->save();

            return view('payment.success');
        } catch (\Exception $ex) {
            // Gérer l'exception
            return back()->withError('Une erreur est survenue lors du paiement Stripe: ' . $ex->getMessage());
        }
    }
    public function form()
    {
        return view('formulaire');
    }
    public function formstore(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'mail' => 'required',
            'service' => 'required',
            'message' => 'required',
        ]);

        // Enregistrement des données dans la base de données
        $quote = new Quote(); // Utilisez le modèle quote
        $quote->nom = $validatedData['nom'];
        $quote->mail = $validatedData['mail'];
        $quote->service = $validatedData['service'];
        $quote->message = $validatedData['message'];
        $quote->save();

        // Redirection vers une page de confirmation ou autre
        return redirect()->route('formulaire')->with('success', 'Demande envoyée avec succès !');
    }
}
