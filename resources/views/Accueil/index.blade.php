@extends('layouts.master')

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>Hotel_Alerte</h1>
                        <p>"Un compagnon fiable pour gérer efficacement les incidents dans votre hôtel."</p>
                        {{-- <a href="#" class="primary-btn">Discover Now</a> --}}
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1" id="booking-form-container">
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

                    <div class="booking-form" style="display:none;">
                        <h4>Inscrivez votre Hotel</h4><br>
                        <form id="myForm" method="post" action="{{ route('hotel.store') }}" class="form">
                            @csrf
                            <fieldset id="step-1">
                                {{-- <legend>Step 1: Check Dates</legend> --}}
                                <div class="select-option">
                                    <label for="pays" class="form-label">Pays</label>
                                    <select id="pays" name="pays">
                                        <option value="">Sélectionner un pays</option>

                                        <option value="Benin">Bénin</option>
                                        <option value="Togo">Togo</option>
                                    </select>
                                    <div id="paysError" class="invalid-feedback"></div>

                                </div>

                                <div class="">
                                    <label for="nom">Hôtel</label>
                                    <input type="text" class="form-control" id="nom" name="nom">
                                    <div id="hotelError" class="invalid-feedback"></div>

                                </div>
                                <div class="">
                                    <label for="telephone">Téléphone</label>
                                    <input type="number" min=0 class="form-control" id="telephone" name="telephone">
                                    <div id="telephoneError" class="invalid-feedback"></div>

                                </div>
                                <div class="">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                    <div id="emailError" class="invalid-feedback"></div>
                                </div>
                                <button type="button" onclick="nextStep(1)" class="btn btn-sm">Suivant</button>
                            </fieldset>

                            <fieldset id="step-2" style="display:none;">
                                {{-- <legend>Step 2: Select Guests</legend> --}}
                                <div class="">
                                    <label for="adresse">Adresse</label>
                                    <input type="text" class="form-control" id="adresse" name="adresse">
                                </div>

                                <div class="">
                                    <label for="ifu">Numero d'identification fiscale</label>
                                    <input type="number" min="0" class="form-control" id="ifu" name="ifu">
                                </div>

                                <div class="">
                                    <label for="responsable">Responsable</label>
                                    <input type="text" class="form-control" id="responsable" name="responsable">
                                </div>

                                {{-- <div class="">
                                    <label for="photo">Photo</label>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                </div> --}}

                                <button type="button" onclick="prevStep(2)">Précédent</button>
                                <button type="button" onclick="nextStep(2)">Suivant</button>
                            </fieldset>

                            <fieldset id="step-3" style="display:none;">
                                {{-- <legend>Step 3: Select Room</legend> --}}
                                <div class="">
                                    <label for="mdp">Mot de passe</label>
                                    <input type="password" class="form-control" id="mdp" name="mdp">
                                </div>

                                <div class="">
                                    <label for="cfmdp">Confirmer mot de passe</label>
                                    <input type="password" class="form-control" id="cfmdp" name="cfmdp">
                                </div>

                                <button type="button" onclick="prevStep(3)">Précédent</button>
                                <button type="submit">Envoyer</button>
                            </fieldset>
                        </form>

                    </div>
                    @if (!Auth::check())
                        <a href="{{ route('login') }}" id="connexion-btn"
                            class="bk-btn btn btn-secondary mt-5">CONNEXION</a>

                        <button id="inscription-btn" class="bk-btn btn btn-secondary mt-5">INSCRIPTION</button>
                    @endif
                </div>
            </div>


        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="img/hero/hero-1.jpg"></div>
            <div class="hs-item set-bg" data-setbg="img/hero/hero-2.jpg"></div>
            <div class="hs-item set-bg" data-setbg="img/hero/hero-3.jpg"></div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Section présentation du logiciel -->
    <section class="aboutus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>Votre Solution Complète pour la Gestion des Incidents Hôteliers</span>

                        </div>
                        <p class="f-para text-justify">HotelAlert est votre allié dans la gestion des incidents dans les
                            hôtels. Conçue
                            pour
                            les hôteliers, cette application intuitive offre un moyen simple et efficace de signaler les
                            clients
                            ayant disparu sans payer, ayant volé du matériel dans leur chambre ou ayant causé des dommages
                            matériels.</p>
                        {{-- <p class="s-para">So when it comes to booking the perfect hotel, vacation rental, resort,
                            apartment, guest house, or tree house, we’ve got you covered.</p> --}}
                        {{-- <a href="#" class="primary-btn about-btn">Read More</a> --}}
                        <a href="#" class="primary-btn about-btn" data-toggle="modal" data-target="#myModal">En
                            savoir plus</a>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> <b>HotelAlert - Votre Solution
                                                Complète pour la Gestion des Incidents
                                                Hôteliers </b></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="text-justify">
                                                        <b>Description :</b>
                                                    </p>
                                                    <p class="text-justify">
                                                        HotelAlert est bien plus qu'une simple application. C'est votre
                                                        partenaire fiable dans la gestion proactive des incidents dans votre
                                                        établissement hôtelier. Conçue spécifiquement pour répondre aux
                                                        besoins des hôteliers, cette plateforme intuitive offre une solution
                                                        complète pour signaler et gérer efficacement toute une gamme
                                                        d'incidents, des clients disparus sans paiement aux vols de matériel
                                                        en passant par les dommages matériels.
                                                    </p>
                                                    <p class="text-justify">
                                                        <b>Signalement des Clients Disparus sans Paiement :</b>
                                                    </p>
                                                    <p class="text-justify">
                                                        Lorsqu'un client quitte votre établissement sans régler sa facture,
                                                        il vous suffit de quelques clics pour enregistrer cet incident dans
                                                        HotelAlert. Indiquez les détails pertinents, tels que le nom du
                                                        client, les dates de séjour et les montants impayés, pour documenter
                                                        l'incident de manière précise et complète.
                                                    </p>
                                                    <p class="text-justify">
                                                        <b>Gestion des Vols de Matériel :</b>
                                                    </p>
                                                    <p class="text-justify">
                                                        Si un client est surpris en train de voler du matériel dans sa
                                                        chambre, HotelAlert vous permet de réagir rapidement. Signalez
                                                        l'incident et fournissez des informations sur les articles volés
                                                        pour faciliter leur récupération et prendre les mesures nécessaires
                                                        pour prévenir de futurs vols.
                                                    </p>
                                                    <p class="text-justify">
                                                        <b>...</b>
                                                    </p>
                                                    <p class="text-justify">
                                                        <b>Rejoignez dès aujourd'hui la communauté d'hôteliers qui font
                                                            confiance à HotelAlert pour assurer la sécurité et le bon
                                                            fonctionnement de leur établissement.</b>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Fermer</button>
                                        <!-- Add additional buttons if needed -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="img/about/about-1.jpg" alt="">
                            </div>
                            <div class="col-sm-6">
                                <img src="img/about/about-2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIN de la Section présentation du logiciel -->

    <!-- Services Section End -->
    {{-- A REVOIRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRr --}}
    {{-- <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>What We Do</span>
                        <h2>Discover Our Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-036-parking"></i>
                        <h4>Travel Plan</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-033-dinner"></i>
                        <h4>Catering Service</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-026-bed"></i>
                        <h4>Babysitting</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-024-towel"></i>
                        <h4>Laundry</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-044-clock-1"></i>
                        <h4>Hire Driver</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-012-cocktail"></i>
                        <h4>Bar & Drink</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna.</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Services Section End -->

    <!-- La section des signalements -->
    <section class="hp-room-section">

        <div class="container">
            <div class="hp-room-items">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <span>Signalements</span>
                            <h2>Les Derniers Signalements</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($clients->take(4) as $client)
                        <div class="col-md-3 mb-4">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <th colspan="2" class="text-center">{{ $client->nom }}</th>
                                    </tr>
                                    <tr>
                                        <th>Nationalité:</th>
                                        <td>{{ $client->pays }}</td>
                                    </tr>
                                    <tr>
                                        <th>Téléphone:</th>
                                        <td>{{ $client->telephone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Hôtel:</th>
                                        <td>
                                            <a href="#" class="hotel-info" data-nom="{{ $client->hotel->nom }}"
                                                data-description="{{ $client->hotel->description }}">{{ $client->hotel->nom }}</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" class="text-center">
                                            <a href="#" class="client-photo-link" data-toggle="modal"
                                                data-target="#clientModal">
                                                {{-- <img src="{{ $client->photo }}" class="client-photo"> --}}
                                                {{-- <img src="avatar5.png" class="card-img-top client-photo" alt="{{ $client->nom }}"> --}}
                                                <img src="{{ asset('images/' . $client->photo) }}"
                                                    class="card-img-top client-photo" alt="{{ $client->nom }}">

                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>

                <!-- Modal -->
                <div class="modal fade" id="hotelModal" tabindex="-1" role="dialog" aria-labelledby="hotelModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hotelModalLabel">Informations sur l'hôtel</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="hotelInfo">
                                <!-- Les informations sur l'hôtel seront affichées ici -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="clientModal" tabindex="-1" role="dialog"
                    aria-labelledby="clientModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="" id="modalClientPhoto" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>

                <style>
                    .client-photo {
                        width: 100px;
                        /* ajustez cette valeur selon vos besoins */
                        height: 50px;
                        /* ajustez cette valeur selon vos besoins */
                        object-fit: cover;
                        /* pour conserver le rapport d'aspect de l'image */
                        transition: transform 0.3s ease;
                        /* Transition pour l'effet d'agrandissement */

                    }


                    .client-photo:hover {

                        transform: scale(1.2);
                        /* Agrandissement de la photo au survol */
                    }

                    .img-fluid {
                        width: 576px;
                        /* ajustez cette valeur selon vos besoins */
                        height: 279px;
                        /* ajustez cette valeur selon vos besoins */
                        object-fit: cover;
                        /* pour conserver le rapport d'aspect de l'image */

                    }
                    /* POUR VOIR TOUT LES SIGNALEMENTS */
                    .centered-link {
                        display: block;
                        margin: 0 auto;
                        text-align: center; /* Centrer le texte à l'intérieur de l'ancre */
                        text-decoration: underline; /* Ajouter un soulignement */
                        text-decoration-color: #dfa974; /* Couleur du soulignement */


                    }
                    

                </style>

                <a href="{{route('client.liste')}}" class="centered-link"><h5 style="color: #dfa974;"> Voir tout les signalements</h5></a>

            </div>
        </div>

    </section>

    <!-- Fin de la section des signalements -->

    <!-- Section témoignage des hôtels -->
    <section class="testimonial-section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title mt-2">
                        <span>Témoignages</span>
                        <h2>Que disent les clients ?
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="testimonial-slider owl-carousel">
                        <div class="ts-item">
                            <p class="text-justify">Hotel-Alerte est un outil essentiel pour tout hôtelier soucieux de la
                                sécurité de son établissement.
                                Grâce à cette plateforme, nous pouvons réagir rapidement et efficacement
                                à toute situation d'urgence, ce qui a considérablement amélioré notre capacité à gérer les
                                incidents.</p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    {{-- <i class="icon_star"></i> --}}
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5> - Hôtel Amazone</h5>
                            </div>
                            {{-- <img src="img/testimonial-logo.png" alt=""> --}}
                        </div>
                        <div class="ts-item">
                            <p class="text-justify">Hotel-Alerte a vraiment simplifié la gestion des incidents dans notre
                                établissement. Nous pouvons désormais
                                signaler et suivre les incidents avec facilité, ce qui nous donne une tranquillité d'esprit
                                incroyable.</p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5> - Hôtel des princes</h5>
                            </div>
                            {{-- <img src="img/testimonial-logo.png" alt=""> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fin de la Section témoignage des hôtels -->

    <!-- MON FAQ -->
    <span class="blog-section spad mt-3">
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Hotel News</span>
                        <h2>Our Blog & Event</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="img/blog/blog-1.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Travel Trip</span>
                            <h4><a href="#">Tremblant In Canada</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="img/blog/blog-2.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Camping</span>
                            <h4><a href="#">Choosing A Static Caravan</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="img/blog/blog-3.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Event</span>
                            <h4><a href="#">Copper Canyon</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 21th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog-item small-size set-bg" data-setbg="img/blog/blog-wide.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Event</span>
                            <h4><a href="#">Trip To Iqaluit In Nunavut A Canadian Arctic City</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 08th April, 2019</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-item small-size set-bg" data-setbg="img/blog/blog-10.jpg">
                        <div class="bi-text">
                            <span class="b-tag">Travel</span>
                            <h4><a href="#">Traveling To Barcelona</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 12th April, 2019</div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title mt-2">
                        <span>FAQ - Hôtel</span>
                        <h2>Les questions les plus courantes</h2>
                    </div>
                </div>
            </div>

            <div class="container mt-5">

                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <div class="accordion-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne">
                            Comment puis-je réserver une chambre ?
                            <span class="accordion-icon">&#43;</span>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse" aria-labelledby="headingOne"
                            data-parent="#faqAccordion">
                            <p>Vous pouvez réserver une chambre en ligne sur notre site Web ou en nous appelant directement
                                au numéro indiqué sur notre page de contact.</p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo">
                            Y a-t-il un service de navette depuis l'aéroport ?
                            <span class="accordion-icon">&#43;</span>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse" aria-labelledby="headingTwo"
                            data-parent="#faqAccordion">
                            <p>Oui, nous proposons un service de navette depuis et vers l'aéroport pour nos clients.
                                Veuillez nous contacter à l'avance pour organiser le ramassage.</p>
                        </div>
                    </div>

                    <!-- Ajoutez plus de questions et de réponses ici -->
                </div>
            </div>

        </div>
    </span>
    <!-- Fin mon FAQ -->

        {{-- CSS FAQ --}}
    <style>
        .accordion-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .accordion-header {
            background-color: #f9f9f9;
            padding: 15px;
            cursor: pointer;
        }

        .accordion-header:hover {
            background-color: #e9ecef;
        }

        .accordion-icon {
            float: right;
            margin-top: 2px;
        }

        .accordion-body {
            display: none;
            padding: 15px;
        }
    </style>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- Le script qui affiche le formulaire d'inscription --}}
<script>
    $(document).ready(function() {
        $("#inscription-btn").click(function() {
            $("#booking-form-container").find('.booking-form').show();
            $(this).hide();
            $("#connexion-btn").hide();

        });
    });
</script>

{{-- Le script qui permet de faire suivant et précédent pour inscription --}}
<script>
    function nextStep(step) {
        var currentStep = document.getElementById('step-' + step);
        var nextStep = document.getElementById('step-' + (step + 1));
        currentStep.style.display = 'none';
        nextStep.style.display = 'block';
    }

    function prevStep(step) {
        var currentStep = document.getElementById('step-' + step);
        var prevStep = document.getElementById('step-' + (step - 1));
        currentStep.style.display = 'none';
        prevStep.style.display = 'block';
    }
</script>

<script>
    $(document).ready(function() {
        // Fonction pour afficher le modal lorsque survolé
        function showHotelModal(nom, description) {
            // Construire le contenu du modal
            var modalContent = '<p>Nom: ' + nom + '</p>';
            modalContent += '<p>Description: ' + description + '</p>';
            // Ajouter d'autres informations selon vos besoins

            // Injecter le contenu dans le modal
            $('#hotelInfo').html(modalContent);

            // Afficher le modal
            $('#hotelModal').modal('show');
        }

        // Au survol du lien
        $('.hotel-info').mouseenter(function() {
            // Récupérer les informations de l'hôtel
            var nom = $(this).data('nom');
            var description = $(this).data('description');

            // Afficher le modal
            showHotelModal(nom, description);
        });

        // Lorsque le curseur quitte le contenu du modal
        $('#hotelInfo').mouseleave(function() {
            // Masquer le modal
            $('#hotelModal').modal('hide');
        });
    });
</script>


<script>
    $(document).ready(function() {
        // Au survol de la photo
        $('.client-photo').mouseenter(function() {
            var src = $(this).attr('src');
            $('#modalClientPhoto').attr('src', src);
            $('#clientModal').modal('show');
        });

        // Lorsque le curseur quitte la photo
        $('.client-photo-link').mouseleave(function() {
            $('#clientModal').modal('hide');
        });
        // Lorsque le curseur quitte le modal de la photo
        $('#clientModal').mouseleave(function() {
            $('#clientModal').modal('hide');
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.accordion-header').click(function() {
            $(this).toggleClass('active').next().slideToggle('fast');
            $('.accordion-header').not(this).removeClass('active').next().slideUp('fast');
        });
    });
</script>
