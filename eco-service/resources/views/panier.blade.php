@extends('layouts.app')

@section('page-content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/style1.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

<div class="container mt-5">
    <br><br><br>
    <h1 class="mb-5"><span>Mon Panier</span></h1>
    <div id="cart-items" class="row">
        <!-- Ici seront affichés les produits du panier -->
    </div>

    <div class="row mt-4">
        <div class="col-md-8 d-flex align-items-center">
            <button class="btn btn-primary" id="continue-shopping">Continuer mes achats</button>
            <button id="emptyCart" class="btn btn-danger ml-3">
                <i class="fas fa-trash-alt"></i> Vider le panier
            </button>
        </div>
        <div class="col-md-4 text-right">
            <h4>Total: <span id="cart-total">€0</span></h4>
            <!-- Bouton pour afficher le formulaire de paiement -->
            <button class="mb-5 btn btn-success" id="checkout">Passer la commande</button>
        </div>
    </div>

    <!-- Formulaire des détails de l'utilisateur -->
    <div id="user-details-form" style="display:none;">
        <h2>Informations de livraison</h2>
        <form id="payment-form" method="POST" action="{{ route('process-payment') }}">
            @csrf
            <div class="form-group">
                <label for="customer_firstname">Nom</label>
                <input type="text" class="form-control" id="customer_firstname" name="customer_firstname" required>
            </div>
            <div class="form-group">
                <label for="customer_lastname">Prénom</label>
                <input type="text" class="form-control" id="customer_lastname" name="customer_lastname" required>
            </div>
            <div class="form-group mb-2">
                <label for="shipping_address">Adresse de livraison</label>
                <input type="text" class="form-control" id="shipping_address" name="shipping_address" required>
            </div>
            <input type="hidden" id="total_amount" name="total_amount">
            <input type="hidden" id="cart-items-data" name="cart_items">

            <!-- Champ pour le jeton de paiement de Stripe -->
            <input type="hidden" name="stripeToken" id="stripeToken">

            <!-- Ajoutez l'élément card ici -->
            <div class="form-group">
                <label for="card-element">Carte de crédit</label>
                <div id="card-element">
                    <!-- Un élément de carte Stripe sera inséré ici. -->
                </div>
                <!-- Utilisé pour afficher les erreurs -->
                <div id="card-errors" role="alert"></div>
            </div>

            <button type="submit" class="mb-5 btn btn-primary">Procéder au paiement</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script>
    $(document).ready(function() {
        var cartCount = localStorage.getItem('cartCount') ? parseInt(localStorage.getItem('cartCount')) : 0;
        $('.cart-count').text(cartCount);

        function getCartItems() {
            var cartItems = localStorage.getItem('cartItems');
            return cartItems ? JSON.parse(cartItems) : [];
        }

        var cartItems = getCartItems();

        function calculateCartTotal() {
            var total = 0;
            cartItems.forEach(function(item) {
                total += item.quantity * item.price;
            });
            return total.toFixed(2);
        }

        function updateCartView() {
            $('#cart-items').empty();
            cartItems.forEach(function(item) {
                var itemHTML = `
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">${item.name}</h5>
                                <input type="hidden" class="product-id" value="${item.id}">
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
            window.location.href = "{{ route('catalogue') }}";
        });

        $('#emptyCart').click(function() {
            localStorage.removeItem('cartItems');
            localStorage.setItem('cartCount', '0');
            cartItems = [];
            updateCartView();
            $('.cart-count').text('0');
            alert('Le panier a été vidé.');
        });

        $(document).on('click', '.delete-item', function() {
            var productId = $(this).closest('.card-body').find('.product-id').val();
            var index = cartItems.findIndex(item => item.id == productId);

            if (index !== -1) {
                var deletedItem = cartItems[index];
                var deletedQuantity = deletedItem.quantity;

                cartCount -= deletedQuantity;
                localStorage.setItem('cartCount', cartCount);

                cartItems.splice(index, 1);
                localStorage.setItem('cartItems', JSON.stringify(cartItems));

                updateCartView();
                $('.cart-count').text(cartCount);
            } else {
                console.error('Article non trouvé dans le panier.');
            }
        });

        $('#checkout').click(function() {
            $('#total_amount').val(calculateCartTotal());
            $('#cart-items-data').val(JSON.stringify(cartItems));
            $('#user-details-form').show(); // Afficher le formulaire de détails de l'utilisateur
            $('html, body').animate({
                scrollTop: $("#user-details-form").offset().top
            }, 1000);
        });

        // Configuration de Stripe
        var stripe = Stripe('{{ $stripeKey }}');
        var elements = stripe.elements();

        // Personnalisation du style du formulaire Stripe
        var style = {
            base: {
                fontSize: '30px',
                color: '#32325d',
            },
        };

        // Création d'un élément de carte Stripe
        var card = elements.create('card', {
            style: style
        });
        card.mount('#card-element');

        // Écouteur pour capturer le jeton de paiement de Stripe
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Informer l'utilisateur en cas d'erreur
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Succès - Ajouter le jeton de paiement au formulaire
                    document.getElementById('stripeToken').value = result.token.id;

                    // Soumettre le formulaire
                    form.submit();
                }
            });
        });
    });
</script>

@endsection