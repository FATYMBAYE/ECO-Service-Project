<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Orders_Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;

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
    private $apiContext;

    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('services.paypal.client_id'),
                config('services.paypal.secret')
            )
        );
        $this->apiContext->setConfig(config('services.paypal.settings'));
    }

    public function processPayment(Request $request)
    {
        // Valider les données du formulaire et enregistrer les détails de la commande dans la base de données
        $request->validate([
            'customer_firstname' => 'required|string|max:255',
            'customer_lastname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'total_amount' => 'required|numeric',
            'cart_items' => 'required|json',
        ]);

        $order = new Order();
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->addrshipping_addressess = $request->shipping_address;
        $order->total = $request->total_amount;
        $order->status = 'pending';
        $order->save();

        $cartItems = json_decode($request->cart_items, true);
        foreach ($cartItems as $item) {
            $order_item = new Orders_Item();
            $order_item->order_id = $order->id;
            $order_item->product_id = $item['id'];
            $order_item->quantity = $item['quantity'];
            $order_item->price = $item['price'];
            $order_item->save();
        }

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($request->total_amount);
        $amount->setCurrency('EUR');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription('Description de la transaction');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('payment-success'))
                     ->setCancelUrl(route('payment-cancel'));

        $payment = new Payment();
        $payment->setIntent('sale')
                ->setPayer($payer)
                ->setTransactions([$transaction])
                ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {
            // Gérer l'exception
            return back()->withError('Une erreur est survenue lors du paiement PayPal.');
        }
    }

    public function paymentSuccess(Request $request)
    {
        $paymentId = $request->paymentId;
        $payerId = $request->PayerID;

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        try {
            $result = $payment->execute($execution, $this->apiContext);
            // Mettre à jour le statut de la commande à "completed"
            // ...
            return view('payment.success');
        } catch (PayPalConnectionException $ex) {
            // Gérer l'exception
            return back()->withError('Une erreur est survenue lors du paiement PayPal.');
        }
    }

    public function paymentCancel()
    {
        // Gérer l'annulation du paiement
        return view('payment.cancel');
    }
}
