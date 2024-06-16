@extends('./layouts.app')

@section('page-content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <img src="{{ asset('img/e1.jpg') }}" alt="Product Image" class="mb-5 mt-5 img-fluid product-image">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2 class="mt-5">Product Name</h2>
            <p class="price_text">Price: <span style="color: #262626;">$30</span></p>
            <p>Available Stock: <span id="stock">5</span></p>
            <div class="quantity">
                <button class="btn btn-outline-secondary" id="decreaseQuantity">-</button>
                <input type="text" id="quantityInput" value="1" class="form-control d-inline-block" style="width: 60px; text-align: center;">
                <button class="btn btn-outline-secondary" id="increaseQuantity">+</button>
            </div>
            <div class="btn_main mt-3">
                <button class="btn btn-primary" id="addToCart">Add to Cart</button>
            </div>
        </div>
    </div>
</div>

<!-- Floating Cart Icon -->
<div class="floating-cart">
    <i class="fas fa-shopping-cart"></i>
    <span class="cart-count">0</span>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        var stock = parseInt($('#stock').text());
        var quantityInput = $('#quantityInput');

        // Initialize cart count from localStorage
        var cartCount = localStorage.getItem('cartCount') ? parseInt(localStorage.getItem('cartCount')) : 0;
        $('.cart-count').text(cartCount);

        function checkStock() {
            if (stock <= 0) {
                $('#addToCart').prop('disabled', true);
                $('#decreaseQuantity').prop('disabled', true);
                $('#increaseQuantity').prop('disabled', true);
                quantityInput.prop('disabled', true);
                alert('This product is out of stock.');
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
            var quantity = parseInt(quantityInput.val());
            if (quantity <= stock) {
                cartCount += quantity;
                $('.cart-count').text(cartCount);
                localStorage.setItem('cartCount', cartCount);
                alert('Added ' + quantity + ' item(s) to cart');
            } else {
                alert('Not enough stock available.');
            }
        });
    });
</script>
@endsection