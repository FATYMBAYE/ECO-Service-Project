<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Eco-service</title>
    <link rel="stylesheet" href="linkToCSS" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-marron fixed-top shadow">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="">
                    <img src="{{ asset('img/eco_logo.png') }}" alt="Logo" width="70" height="60" class="d-inline-block align-text-top">
                    <span><b>Eco-Services</b></span>
                </a>

                <ul class="navbar-nv justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link custom-text-color" href="{{ route('accueilpro') }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="link custom-text-color" href="{{ route('cataloguepro') }}">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="link custom-text-color" href="{{ route('formulaire') }}">Demande de de devis</a>
                    </li>
                    <li class="nav-item">
                        <a class="link custom-text-color" href="{{ route('menu') }}">Menu</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="catalogue_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="catalogue_title">Nos services</h1>
                        <div class="catalogue_section_2">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 mb-4">
                                    <div class="box_main">
                                        <h4 class="prod_text">Compostage</h4>
                                        <div class="prod_img"><img src="{{ asset('img/s1.jpg') }}" alt="Service 1"></div>
                                        <div class="btn_main">
                                            <a href="" class="seemore_bt">Voir plus</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 mb-4">
                                    <div class="box_main">
                                        <h4 class="prod_text">Recyclage de l'électronique</h4>
                                        <div class="prod_img"><img src="{{ asset('img/s2.jpg') }}" alt="Service 2"></div>
                                        <div class="btn_main">
                                            <a href="" class="seemore_bt">Voir plus</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 mb-4">
                                    <div class="box_main">
                                        <br><br><br>
                                        <h4 class="prod_text">Destruction sécurisée des documents </h4>
                                        <div class="prod_img mt-5"><img src="{{ asset('img/s3.jpg') }}" alt="Service 3"></div>
                                        <div class="btn_main">
                                            <a href="" class="seemore_bt">Voir plus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="container">
                        <h1 class="catalogue_title">Nos services</h1>
                        <div class="catalogue_section_2">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 mb-4">
                                    <div class="box_main">
                                        <h4 class="prod_text">Recyclage des emballages</h4>
                                        <div class="prod_img"><img src="{{ asset('img/s2.jpg') }}" alt="Service 4"></div>
                                        <div class="btn_main">
                                            <a href="" class="seemore_bt">Voir plus</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 mb-4">
                                    <div class="box_main">
                                        <h4 class="prod_text">Nettoyage écologique</h4>
                                        <div class="prod_img"><img src="{{ asset('img/s1.jpg') }}" alt="Service 5"></div>
                                        <div class="btn_main">
                                            <a href="" class="seemore_bt">Voir plus</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 mb-4">
                                    <div class="box_main">
                                        <h4 class="prod_text">Nettoyage des espaces publics et naturels</h4>
                                        <div class="prod_img"><img src="{{ asset('img/s4.png') }}" alt="Service 6"></div>
                                        <div class="btn_main">
                                            <a href="" class="seemore_bt">Voir plus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                    <i class="fas fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                    <i class="fas fa-angle-right"></i>
                </a>

            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </div>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Eco-Services</h3>
                            <div class="contact-info">
                                <p><i class="fas fa-map-marker-alt"></i>974 Rue de la Bergeresse, 45100 Olivet</p>
                                <p><i class="fa fa-envelope"></i>ecoservices@gmail.com</p>
                                <p><i class="fa fa-phone"></i>+33 7 44 19 18 67</p>
                                <div class="social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                    </div>
                    <div class="col-lg-3 col-md-6">
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Liens utiles</h3>
                            <ul>
                                <li><a href="">Nos produits disponibles</a></li>
                                <li><a href="">La démarche 0 déchet : pourquoi ?</a></li>
                                <li><a href="">Contactez-Nous</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
</body>

</html>