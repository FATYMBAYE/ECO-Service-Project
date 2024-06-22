<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Eco-service</title>
    <link rel="stylesheet" href="linkToCSS" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
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
    <!-- Contact Start -->
    <div class="contact">
        <div class="container mb-1">
            <div class="row align-items-center">
                <div class="col-md-6">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="contact-form">
                        <form action="{{ route('formulaire.store') }}" method="GET">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-2">
                                    <input type="text" class="form-control" placeholder="Nom de votre entreprise" name="nom" />
                                </div>
                                <div class="form-group col-md-6 mb-2">
                                    <input type="email" class="form-control" placeholder="votre email" name="mail" />
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" class="form-control" placeholder="Quel service voudriez vous auprès de nous ?" name="service" />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control mb-2" rows="7" placeholder="Votre Message" name="message"></textarea>
                            </div>
                            <div><button class="btn btn-primary" type="submit">Envoyer</button></div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-info">
                        <h3>Contactez-Nous pour votre demande de devis</h3>
                        <p>
                            N'hésitez pas à nous contacter pour toute demande de renseignements sur ce que nous faisons, pour fixer un rendez-vous dans notre association
                            ou pour toute autre question. Nous sommes là pour vous aider et répondre à vos besoins. <br>

                            Nous nous engageons à vous faire un retour dans les plus brefs délais. <br><br>
                            <em> Votre satisfaction est notre priorité, et nous sommes disponibles pour vous accompagner à chaque étape. Merci de nous faire confiance et de nous donner l'opportunité de vous aider.</em>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
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