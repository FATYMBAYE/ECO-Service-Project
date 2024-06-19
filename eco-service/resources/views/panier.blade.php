@extends('layouts.app')

@section('page-content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/style1.css') }}">
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
        </div>
    </div>

    <!-- Formulaire pour recueillir les informations client -->
    <div class="mt-4">
        <form id="payment-form">
            @csrf
            <div class="form-group">
                <label for="first_name">Prénom</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Nom</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="address">Adresse de livraison</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <input type="hidden" id="total_amount" name="total_amount">
            <input type="hidden" id="cart_items" name="cart_items">
        </form>
        <div id="paypal-button-container"></div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency=EUR"></script>
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

            console.log('Product ID:', productId);
            console.log('Index found:', index);
            console.log('Cart Items:', cartItems);

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

        paypal.Buttons({
            createOrder: function(data, actions) {
                $('#total_amount').val(calculateCartTotal());
                $('#cart_items').val(JSON.stringify(cartItems));
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: calculateCartTotal()
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Sauvegarder les informations de la commande dans la base de données
                    $.post("{{ route('process-payment') }}", $('#payment-form').serialize())
                        .done(function(response) {
                            alert('Paiement réussi !');
                            // Vider le panier après le paiement
                            localStorage.removeItem('cartItems');
                            localStorage.setItem('cartCount', '0');
                            cartItems = [];
                            updateCartView();
                            $('.cart-count').text('0');
                        }).fail(function(error) {
                            alert('Une erreur est survenue lors de la sauvegarde de la commande.');
                        });
                });
            },
            onCancel: function(data) {
                alert('Paiement annulé.');
            },
            onError: function(err) {
                alert('Une erreur est survenue lors du paiement.');
            }
        }).render('#paypal-button-container');
    });
</script>
@endsection