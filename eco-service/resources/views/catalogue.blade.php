@extends('./layouts.app')

@section('page-content')
<link rel="stylesheet" href="{{ asset('css/style1.css') }}">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="catalogue_section">
    <div id="main_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <!-- First Slide -->
            <div class="carousel-item active">
                <div class="container">
                    <h1 class="catalogue_title">Les types de produits éco-responsables</h1>
                    <div class="catalogue_section_2">
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 mb-4">
                                <div class="box_main">
                                    <h4 class="prod_text">Dentifrice solide ou en poudre</h4>
                                    <p class="prix_text">Prix <span>€30</span></p>
                                    <div class="prod_img"><img src="{{ asset('img/e5.jpg') }}" alt="Product 1"></div>
                                    <div class="btn_main">
                                        <a href="{{ route('detailprod') }}" class="seemore_bt">voir plus</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 mb-4">
                                <div class="box_main">
                                    <h4 class="prod_text">Cotons-tiges réutilisables</h4>
                                    <p class="prix_text">Prix <span>€10</span></p>
                                    <div class="prod_img"><img src="{{ asset('img/e2.jpg') }}" alt="Product 2"></div>
                                    <div class="btn_main">
                                        <a href="#" class="seemore_bt">voir plus</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 mb-4">
                                <div class="box_main">
                                    <h4 class="prod_text">Brosse à dents en bambou</h4>
                                    <p class="prix_text">Prix <span>€20</span></p>
                                    <div class="prod_img"><img src="{{ asset('img/e1.jpg') }}" alt="Product 3"></div>
                                    <div class="btn_main">
                                        <a href="#" class="seemore_bt">voir plus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Second Slide -->
            <div class="carousel-item">
                <div class="container">
                    <h1 class="catalogue_title">Les types de produits éco-responsables</h1>
                    <div class="catalogue_section_2">
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 mb-4">
                                <div class="box_main">
                                    <h4 class="prod_text">Brosse à dents en bambou</h4>
                                    <p class="prix_text">Prix <span>€20</span></p>
                                    <div class="prod_img"><img src="{{ asset('img/e1.jpg') }}" alt="Product 4"></div>
                                    <div class="btn_main">
                                        <a href="#" class="seemore_bt">voir plus</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 mb-4">
                                <div class="box_main">
                                    <h4 class="prod_text">Essuie-tout réutilisable</h4>
                                    <p class="prix_text">Prix <span>€40</span></p>
                                    <div class="prod_img"><img src="{{ asset('img/e4.png') }}" alt="Product 5"></div>
                                    <div class="btn_main">
                                        <a href="#" class="seemore_bt">voir plus</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 mb-4">
                                <div class="box_main">
                                    <h4 class="prod_text">Brosse à dents en bambou</h4>
                                    <p class="prix_text">Prix <span>€20</span></p>
                                    <div class="prod_img"><img src="{{ asset('img/e1.jpg') }}" alt="Product 6"></div>
                                    <div class="btn_main">
                                        <a href="#" class="seemore_bt">voir plus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Third Slide -->
            <div class="carousel-item">
                <div class="container">
                    <h1 class="catalogue_title">Les types de produits éco-responsables</h1>
                    <div class="catalogue_section_2">
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 mb-4">
                                <div class="box_main">
                                    <h4 class="prod_text">Dentifrice solide ou en poudre</h4>
                                    <p class="prix_text">Prix <span>€30</span></p>
                                    <div class="prod_img"><img src="{{ asset('img/e5.jpg') }}" alt="Product 7"></div>
                                    <div class="btn_main">
                                        <a href="#" class="seemore_bt">voir plus</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 mb-4">
                                <div class="box_main">
                                    <h4 class="prod_text">Gourdes en acier/verres</h4>
                                    <p class="prix_text">Prix <span>€25</span></p>
                                    <div class="prod_img"><img src="{{ asset('img/e3.jpg') }}" alt="Product 8"></div>
                                    <div class="btn_main">
                                        <a href="#" class="seemore_bt">voir plus</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 mb-4">
                                <div class="box_main">
                                    <h4 class="prod_text">Cotons-tiges réutilisables</h4>
                                    <p class="prix_text">Prix <span>€10</span></p>
                                    <div class="prod_img"><img src="{{ asset('img/e2.jpg') }}" alt="Product 9"></div>
                                    <div class="btn_main">
                                        <a href="#" class="seemore_bt">voir plus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#main_slider" data-bs-slide="prev">
            <i class="fas fa-angle-left"></i>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#main_slider" data-bs-slide="next">
            <i class="fas fa-angle-right"></i>
        </button>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</div>
<!-- Floating Cart Icon -->
<div class="floating-cart">
    <i class="fas fa-shopping-cart"></i>
    <span class="cart-count">0</span>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize cart count from localStorage
        var cartCount = localStorage.getItem('cartCount') ? parseInt(localStorage.getItem('cartCount')) : 0;
        $('.cart-count').text(cartCount);

        $('.add-to-cart').click(function() {
            cartCount += 1;
            $('.cart-count').text(cartCount);
            localStorage.setItem('cartCount', cartCount);
            alert('Added 1 item to cart');
        });
    });
</script>
@endsection