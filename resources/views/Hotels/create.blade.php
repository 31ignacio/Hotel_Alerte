@extends('layouts.master2')

@section('content')
    <section>
        <div class="container">
            <div class="container">
                <div class="row">
                    <a href="{{ route('hotel.accueil') }}" class="btn btn-sm btn-secondary">Retour</a>

                    <div class="col-md-12 text-center mb-3">

                        {{-- <h2>Description du signalement</h2> --}}
                        <b>Rejoignez Hotel Alerte : Inscrivez votre hôtel dès aujourd'hui !</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="aze.jpg" class="img-fluid" alt="Image Client"><br><br>

                        <p class="text-justify">
                            Protégez votre établissement en signalant rapidement tout incident ou comportement suspect grâce
                            à Hotel Alerte. Inscrivez-vous dès maintenant pour contribuer à maintenir un environnement sûr
                            et sécurisé pour vos clients et votre personnel.
                        </p>

                    </div>
                    <div class="col-md-6">

                        {{-- Message de succès --}}
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                @if (Session::get('success_message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ Session::get('success_message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true" style="font-size: 30px;">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center mb-3">Inscription Hôtel</h5>
                                <form id="paymentForm" method="post" action="{{ route('hotel.store') }}">
                                    @csrf
                                    <input type="text" name="payment_status" value="success">
                                

                                    <div class="form-row mb-3">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" id="nom" name="nom"
                                                placeholder="Nom de l'hôtel">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <select id="pays" name="pays" class="form-select">
                                                <option value="">Sélectionner un pays</option>
                                                <option value="Benin">Bénin</option>
                                                <option value="Togo">Togo</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row mb-3">
                                        <div class="form-group col-md-6">
                                            <input type="number" min=0 class="form-control" id="telephone" name="telephone"
                                                placeholder="Téléphone">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email@exemple.com">
                                        </div>
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" id="adresse" name="adresse"
                                                placeholder="Adresse">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" id="responsable" name="responsable"
                                                placeholder="Nom du responsable">
                                        </div>
                                    </div>
                                
                                    <div class="form-row mb-3">
                                        <div class="form-group col-md-6">
                                            <input type="password" class="form-control" id="mdp" name="mdp"
                                                placeholder="Mot de passe">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="password" class="form-control" id="cfmdp" name="cfmdp"
                                                placeholder="Confirmer mot de passe">
                                        </div>
                                    </div>
                                    {{-- <button type="submit" class="kkiapay-button btn btn-primary">Soumettre</button> --}}
                                    <!-- Bouton pour ouvrir le modal de paiement -->
    {{-- <button class="btn btn-primary">Payer</button> --}}
    <button type="button" onclick="processPayment()" class="kkiapay-button btn btn-primary">Payer</button>

    <!-- Intégration de Kkiapay pour le paiement -->
    <script amount="4907" callback="paymentCallback" position="right" sandbox="true" 
        key="caf3f6e0eacf11ee80ae5bdd91083b6e" src="https://cdn.kkiapay.me/k.js"></script>

    <script>
        // Fonction pour traiter le paiement
        function processPayment() {
            // Appel à l'API de paiement (Kkiapay)
            KkiaPay({
                amount: 4907, // Montant du paiement
                callback: paymentCallback, // Fonction de rappel après le paiement
                position: "right", // Position du widget de paiement
                sandbox: true, // Mode bac à sable pour les tests
                key: "tsk_caf44501eacf11ee80ae5bdd91083b6e" // Clé d'API Kkiapay
            });
        }

        // Fonction de rappel après le paiement
        function paymentCallback(response) {
            // Vérifiez si le paiement est réussi
            if (response.status === "success") {
                // Soumettez le formulaire après le paiement réussi
                document.getElementById("paymentForm").submit();
            } else {
                // Gérez les erreurs de paiement
                console.log("Erreur de paiement: " + response.message);
                // Affichez un message d'erreur à l'utilisateur
                alert("Erreur de paiement: " + response.message);
            }
        }
    </script>
    
    

                                          </form>

                                <div id="emailHelp" class="form-text text-center mb-5 text-dark">
                                    Déjà inscrit ? <a href="{{ route('login') }}" class="text-dark fw-bold"><span
                                            class="badge badge-info"> Connectez-vous </span></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>



    </section>

    <!-- Intégration de Kkiapay pour le paiement -->

    <br><br>
@endsection
