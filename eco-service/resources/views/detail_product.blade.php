@extends('layouts.app')

@section('page-content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="mb-5 mt-5 img-fluid product-image">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2 class="mt-5">{{ $product->name }}</h2>
            <p class="price_text">Prix: <span style="color: #262626;">€{{ $product->price }}</span></p>
            <p>{{ $product->description }}</p>
            <p>Stock disponible: <span id="stock">{{ $product->quantity }}</span></p>
            <div class="quantity">
                <button class="btn btn-outline-secondary" id="decreaseQuantity">-</button>
                <input type="text" id="quantityInput" value="1" class="form-control d-inline-block" style="width: 60px; text-align: center;">
                <button class="btn btn-outline-secondary" id="increaseQuantity">+</button>
            </div>
            <div class="btn_main mt-3">
                <button class="btn btn-primary" id="addToCart" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}">Ajouter au panier</button>
            </div>
        </div>
    </div>
</div>


<div class="floating-cart">
    <i class="fas fa-shopping-cart"></i>
    <span class="cart-count">0</span>
</div>

<div class="floating-empty-cart">
    <button id="emptyCart" class="btn btn-danger mb-2">
        <i class="fas fa-trash-alt"></i> Vider le panier
    </button>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        var stock = parseInt($('#stock').text());
        var quantityInput = $('#quantityInput');

        // Initialise le nombre de panier depuis localStorage
        var cartCount = localStorage.getItem('cartCount') ? parseInt(localStorage.getItem('cartCount')) : 0;
        $('.cart-count').text(cartCount);

        // Initialise le panier depuis localStorage
        var cartItems = localStorage.getItem('cartItems') ? JSON.parse(localStorage.getItem('cartItems')) : [];

        function checkStock() {
            if (stock <= 0) {
                $('#addToCart').prop('disabled', true);
                $('#decreaseQuantity').prop('disabled', true);
                $('#increaseQuantity').prop('disabled', true);
                quantityInput.prop('disabled', true);
                alert('Ce produit est en rupture de stock.');
            } else {
                $('#addToCart').prop('disabled', false);
                $('#decreaseQuantity').prop('disabled', false);
                $('#increaseQuantity').prop('disabled', false);
                quantityInput.prop('disabled', false);
            }
        }

        checkStock();

        $('#decreaseQuantity').click(function() {
            var currentQuantity = parseInt(quantityInput.val());
            if (currentQuantity > 1) {
                quantityInput.val(currentQuantity - 1);
            }
        });

        $('#increaseQuantity').click(function() {
            var currentQuantity = parseInt(quantityInput.val());
            if (currentQuantity < stock) {
                quantityInput.val(currentQuantity + 1);
            }
        });

        $('#addToCart').click(function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var price = $(this).data('price');
            var quantity = parseInt(quantityInput.val());

            if (quantity <= stock) {
                // Construire l'objet du produit à ajouter au panier
                var productToAdd = {
                    id: id,
                    name: name,
                    price: price,
                    quantity: quantity
                };

                // Ajouter le produit au panier
                cartItems.push(productToAdd);

                // Mettre à jour localStorage avec les produits du panier
                localStorage.setItem('cartItems', JSON.stringify(cartItems));

                // Mettre à jour le compteur du panier
                cartCount += quantity;
                $('.cart-count').text(cartCount);
                localStorage.setItem('cartCount', cartCount);

                alert('Ajouté ' + quantity + ' article(s) au panier');
            } else {
                alert('Stock insuffisant.');
            }
        });
    });
</script>
@endsection