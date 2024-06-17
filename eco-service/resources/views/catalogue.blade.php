@extends('./layouts.app')

@section('page-content')
<link rel="stylesheet" href="{{ asset('css/style1.css') }}">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="catalogue_section">
    <div class="container">
        <h1 class="catalogue_title">Les types de produits éco-responsables</h1>
        <div class="catalogue_section_2">
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="card box_main h-100">
                        <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title prod_text">{{ $product->name }}</h4>
                            <p class="card-text prix_text">Prix <span>€{{ $product->price }}</span></p>
                            <div class="mt-auto d-flex justify-content-end">
                                <a href="{{ route('detailprod', ['id' => $product->id]) }}" class="btn btn-dark-green seemore_bt">Voir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Floating Cart Icon -->
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize cart count from localStorage
        var cartCount = localStorage.getItem('cartCount') ? parseInt(localStorage.getItem('cartCount')) : 0;
        $('.cart-count').text(cartCount);

        // Function to empty the cart
        $('#emptyCart').click(function() {
            cartCount = 0;
            $('.cart-count').text(cartCount);
            localStorage.setItem('cartCount', cartCount);
            alert('Le panier a été vidé.');
        });

        // Add to cart functionality
        $('.add-to-cart').click(function() {
            cartCount += 1;
            $('.cart-count').text(cartCount);
            localStorage.setItem('cartCount', cartCount);
            alert('Ajouté 1 article au panier');
        });
    });
</script>

@endsection