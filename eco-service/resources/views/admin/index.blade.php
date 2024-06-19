<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Admin Eco-service </title>
    <link rel="stylesheet" href="linkToCSS" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        crossorigin="anonymous" />

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <div class="container">
        <nav class="navbar navbar-marron fixed-top shadow">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="">
                    <img src="{{ asset('img/eco_logo.png') }}" alt="Logo" width="70" height="60"
                        class="d-inline-block align-text-top">
                    <span><b>Eco-Services</b></span>
                </a>
                <h1 class="text-right">Admin Dashboard</h1>
            </div>

        </nav>
    </div>
    <div id="carouselExampleFade" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/eco-admin.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/ecolo.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/admin.png') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container text-center w-100">
        <div class="row row-cols-3 m-5">
            <div class="col"> <a href="{{ route('products.create') }}" class="btn btn-primary">Gestion
                    Produits</a></button>
            </div>
            <div class="col"><a href="" class="btn btn-info">Gestion Stocks</a></div>
            <div class="col"> <a href="" class="btn btn-success">Demandes Devis</a></div>
        </div>
    </div>
    @yield('page-content')
</body>

</html>
