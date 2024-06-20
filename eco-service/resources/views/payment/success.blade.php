@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Paiement Réussi</div>

                <div class="card-body">
                    <p>Merci pour votre paiement!</p>
                    <p>Votre commande a été traitée avec succès.</p>

                    <div class="mt-4">
                        <h5>Détails de la commande :</h5>
                        <ul>
                            <li><strong>Nom :</strong> {{ $order->customer_firstname }} {{ $order->customer_lastname }}</li>
                            <li><strong>Adresse de livraison :</strong> {{ $order->shipping_address }}</li>
                            <li><strong>Total :</strong> €{{ number_format($order->total_amount, 2) }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection