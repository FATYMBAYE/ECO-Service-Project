<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Admin Eco-service</title>
    <link rel="stylesheet" href="linkToCSS" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <div class="container">
        <nav class="navbar navbar-marron fixed-top shadow">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="">
                    <img src="{{ asset('img/eco_logo.png') }}" alt="Logo" width="70" height="60" class="d-inline-block align-text-top">
                    <span><b>Eco-Services</b></span>
                </a>
                <h1 class="text-right">Admin Dashboard</h1>
            </div>
        </nav>
    </div>
    <div class="w-100">
        <img src="{{ asset('img/eco-admin.jpg') }}" class="img-fluid full-width-image" alt="Admin Dashboard Image">
    </div>

    <div class="container text-center w-100">
        <div class="row justify-content-center m-5">
            <div class="col-auto mb-3">
                <a href="{{ route('products.create') }}" class="btn btn-primary">Gestion des Produits</a>
            </div>
            <div class="col-auto mb-3">
                <a href="{{ route('listes-devis') }}" class="btn btn-success">Demandes de Devis</a>
            </div>
            @auth
            <div class="col-auto mb-3">
                <a href="{{ route('logout') }}" class="btn btn-danger">Déconnexion</a>
            </div>
            @endauth
        </div>
    </div>
    @yield('page-content')
</body>

</html>