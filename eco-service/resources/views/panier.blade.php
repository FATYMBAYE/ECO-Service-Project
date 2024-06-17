@extends('layouts.app')

@section('page-content')
<link rel="stylesheet" href="{{ asset('css/style1.css') }}">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container mt-5">
    <br><br><br>
    <h1 class="mb-5"><span>Mon Panier</span></h1>
    <div id="cart-items" class="row">
        <!-- Ici seront affichés les produits du panier -->
    </div>

    <div class="row mt-4">
        <div class="col-md-8">
            <button class="mb-5 btn btn-primary mr-2" id="continue-shopping">Continuer mes achats</button>
            <button id="emptyCart" class="btn btn-danger mb-2">
                <i class="fas fa-trash-alt"></i> Vider le panier
            </button>
        </div>
        <div class="col-md-4 text-right">
            <h4>Total: <span id="cart-total">€0</span></h4>
            <button class="mb-5 btn btn-success" id="checkout">Passer la commande</button>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        // Fonction pour récupérer les produits du panier depuis le localStorage
        function getCartItems() {
            var cartItems = localStorage.getItem('cartItems');
            return cartItems ? JSON.parse(cartItems) : [];
        }

        var cartItems = getCartItems();

        // Fonction pour calculer le total du panier
        function calculateCartTotal() {
            var total = 0;
            cartItems.forEach(function(item) {
                total += item.quantity * item.price;
            });
            return total.toFixed(2);
        }

        // Fonction pour mettre à jour l'affichage du panier
        function updateCartView() {
            $('#cart-items').empty();
            cartItems.forEach(function(item) {
                var itemHTML = `
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">${item.name}</h5>
                            <p class="card-text">Prix unitaire: €${item.price}</p>
                            <p class="card-text">Quantité: ${item.quantity}</p>
                            <p class="card-text">Prix total: €${(item.quantity * item.price).toFixed(2)}</p>
                            <button class="btn btn-sm btn-danger delete-item">
                                <i class="fas fa-trash-alt"></i> Supprimer
                            </button>
                        </div>
                    </div>
                </div>
                `;
                $('#cart-items').append(itemHTML);
            });

            $('#cart-total').text('€' + calculateCartTotal());
        }

        updateCartView();

        $('#continue-shopping').click(function() {
            // Vider le localStorage avant de retourner à la page catalogue
            localStorage.removeItem('cartItems');
            localStorage.setItem('cartCount', '0'); // Mettre à jour cartCount à 0
            // Redirection vers la page catalogue
            window.location.href = "{{ route('catalogue') }}";
        });

        $('#emptyCart').click(function() {
            // Vider le localStorage et réinitialiser le panier local
            localStorage.removeItem('cartItems');
            localStorage.setItem('cartCount', '0'); // Mettre à jour cartCount à 0
            cartItems = [];
            updateCartView();
            alert('Le panier a été vidé.');
        });

        // Action pour supprimer un article du panier
        $(document).on('click', '.delete-item', function() {
            var index = $(this).closest('.card-body').index();
            cartItems.splice(index, 1);
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            updateCartView();
        });

        $('#checkout').click(function() {
            alert('Commande passée avec succès!');
            localStorage.removeItem('cartItems');
            localStorage.setItem('cartCount', '0'); // Mettre à jour cartCount à 0
            cartItems = [];
            updateCartView();
        });
    });
</script>

@endsection