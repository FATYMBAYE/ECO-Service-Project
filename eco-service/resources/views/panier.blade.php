@extends('./layouts.app')

@section('page-content')
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container mt-5">
    <br><br><br>
    <h1 class="mb-5"><span>Mon Panier</span></h1>
    <div id="cart-items" class="row">
        <!-- Ici seront affichés les produits du panier -->
    </div>

    <div class="row mt-4">
        <div class="col-md-8">
            <button class="mb-5 btn btn-primary mr-2" id="continue-shopping">Continuer mes achats</button>
        </div>
        <div class="col-md-4 text-right">
            <h4>Total: <span id="cart-total">€0</span></h4>
            <button class="mb-5 btn btn-success" id="checkout">Passer la commande</button>
        </div>
    </div>
</div>

<!-- Script pour charger les produits du panier -->
<script>
    $(document).ready(function() {
        // Exemple de produit ajouté au panier (simulé)
        var cartItems = [{
                name: "Dentifrice solide ou en poudre",
                price: 30,
                quantity: 2 // Exemple de quantité
            },
            {
                name: "Dentifrice solide ou en poudre",
                price: 30,
                quantity: 2 // Exemple de quantité
            }
        ];

        // Fonction pour calculer le total du panier
        function calculateCartTotal() {
            var total = 0;
            cartItems.forEach(function(item) {
                total += item.quantity * item.price;
            });
            return total.toFixed(2); // Pour arrondir à 2 décimales
        }

        // Fonction pour mettre à jour l'affichage du panier
        function updateCartView() {
            $('#cart-items').empty();
            cartItems.forEach(function(item) {
                var itemHTML = `
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">${item.name}</h5>
                                <p class="card-text">Prix unitaire: €${item.price}</p>
                                <p class="card-text">Quantité: ${item.quantity}</p>
                                <p class="card-text">Prix total: €${(item.quantity * item.price).toFixed(2)}</p>
                            </div>
                        </div>
                    </div>
                `;
                $('#cart-items').append(itemHTML);
            });

            // Mettre à jour le total du panier
            $('#cart-total').text('€' + calculateCartTotal());
        }

        // Charger l'affichage initial du panier
        updateCartView();

        // Action sur le bouton "Continuer mes achats"
        $('#continue-shopping').click(function() {
            window.location.href = "{{ route('catalogue') }}";
        });

        // Action sur le bouton "Passer la commande"
        $('#checkout').click(function() {
            // Ici vous pouvez implémenter la logique pour passer la commande
            // Par exemple, envoyer une requête au serveur pour traiter la commande
            // et vider le panier après la commande réussie
            alert('Commande passée avec succès!');
            localStorage.removeItem('cartItems');
            cartItems = []; // Vider le panier après la commande
            updateCartView(); // Mettre à jour l'affichage du panier après la suppression
        });
    });
</script>

@endsection