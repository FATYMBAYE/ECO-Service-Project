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
            <button class="mb-5 btn btn-success" id="checkout">Passer la commande</button>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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

        $('#checkout').click(function() {
            alert('Commande passée avec succès!');
            localStorage.removeItem('cartItems');
            localStorage.setItem('cartCount', '0');
            cartItems = [];
            updateCartView();
            $('.cart-count').text('0');
        });
    });
</script>

@endsection