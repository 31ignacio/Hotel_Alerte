@extends('layouts.master')

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>Sona A Luxury Hotel</h1>
                        <p>Here are the best hotel booking sites, including recommendations for international
                            travel and for finding low-priced hotel rooms.</p>
                        <a href="#" class="primary-btn">Discover Now</a>
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
                        <form  id="myForm" method="post" action="{{route('hotel.store')}}" class="form">
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
                    <a href="{{route('login')}}" id="connexion-btn" class="bk-btn btn btn-secondary mt-5">CONNEXION</a>

                    <button id="inscription-btn" class="bk-btn btn btn-secondary mt-5">INSCRIPTION</button>
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

    <!-- About Us Section Begin -->
    <section class="aboutus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>Votre Solution Complète pour la Gestion des Incidents Hôteliers</span>
                            
                        </div>
                        <p class="f-para">HotelAlert est votre allié dans la gestion des incidents dans les hôtels. Conçue
                            pour
                            les hôteliers, cette application intuitive offre un moyen simple et efficace de signaler les
                            clients
                            ayant disparu sans payer, ayant volé du matériel dans leur chambre ou ayant causé des dommages
                            matériels.</p>
                        <p class="s-para">So when it comes to booking the perfect hotel, vacation rental, resort,
                            apartment, guest house, or tree house, we’ve got you covered.</p>
                        {{-- <a href="#" class="primary-btn about-btn">Read More</a> --}}
                        <a href="#" class="primary-btn about-btn" data-toggle="modal" data-target="#myModal">En savoir plus</a>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> <b>HotelAlert - Votre Solution Complète pour la Gestion des Incidents
                                            Hôteliers </b></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <p><b>Description Développée :</b></p>
                                        <p>HotelAlert est bien plus qu'une simple application. C'est votre partenaire fiable dans la gestion proactive des incidents dans votre établissement hôtelier. Conçue spécifiquement pour répondre aux besoins des hôteliers, cette plateforme intuitive offre une solution complète pour signaler et gérer efficacement toute une gamme d'incidents, des clients disparus sans paiement aux vols de matériel en passant par les dommages matériels.</p>
                                        <p>Grâce à HotelAlert, la gestion des incidents devient plus efficace que jamais. Plus besoin de vous soucier de la paperasse ou des processus complexes. Notre interface conviviale vous permet de signaler rapidement et facilement tout incident, en fournissant toutes les informations nécessaires de manière claire et concise.</p>
                                        <p><b>Signalement des Clients Disparus sans Paiement :</b></p>
                                        <p>Lorsqu'un client quitte votre établissement sans régler sa facture, il vous suffit de quelques clics pour enregistrer cet incident dans HotelAlert. Indiquez les détails pertinents, tels que le nom du client, les dates de séjour et les montants impayés, pour documenter l'incident de manière précise et complète.</p>
                                        <p><b>Gestion des Vols de Matériel :</b></p>
                                        <p>Si un client est surpris en train de voler du matériel dans sa chambre, HotelAlert vous permet de réagir rapidement. Signalez l'incident et fournissez des informations sur les articles volés pour faciliter leur récupération et prendre les mesures nécessaires pour prévenir de futurs vols.</p>
                                        <p><b>Signalement des Dommages Matériels :</b></p>
                                        <p>Les incidents de dommages matériels peuvent être coûteux pour votre établissement. Avec HotelAlert, vous pouvez documenter rapidement les dommages causés aux équipements ou aux installations de l'hôtel. Prenez des photos, décrivez les dommages et suivez le processus de réparation pour assurer une résolution rapide et efficace.</p>
                                        <p>HotelAlert vous permet de gérer tous ces incidents et bien plus encore, le tout à partir d'une seule et même plateforme. Notre objectif est de simplifier la gestion des incidents pour que vous puissiez vous concentrer sur l'expérience de vos clients et sur la réussite de votre établissement.</p>
                                        <p>Rejoignez dès aujourd'hui la communauté d'hôteliers qui font confiance à HotelAlert pour assurer la sécurité et le bon fonctionnement de leur établissement.</p>



                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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
    <!-- About Us Section End -->

    <!-- Services Section End -->
    <section class="services-section spad">
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
    </section>
    <!-- Services Section End -->

    <!-- La section des signalements -->
    <section class="hp-room-section">
        <div class="container-fluid">
            <div class="hp-room-items">
                <div class="row">
                    
                    @foreach($clients->take(4) as $client)
                        <div class="col-lg-3 col-md-6">
                            <div class="hp-room-item set-bg" data-setbg="img/room/room-b2.jpg">
                                <div class="hr-text">
                                    <h3>{{ $client->nom}}</h3>
                                    <h2 style="font-size: 23px;">Signalé le :{{ \Carbon\Carbon::parse($client->created_at)->format('j/m/Y') }}</h2>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="r-o">Nationalité:</td>
                                                <td>{{ $client->pays }}</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Téléphone:</td>
                                                <td>{{ $client->telephone }}</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Hôtel:</td>
                                                <td>{{ $client->hotel->nom }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <b style="font-size: 14px;" class="r-o bg-white">Cliquer sur <span style="color: #dfa974;">Voir détail</span> pour plus de détails</b>
                                        <br><br><br>
                                        <a href="{{ route('client.show', $client->id) }}" class="primary-btn text-center d-block mx-auto">Voir Détails</a>
                                    </div>
                            </div>
                        </div> 
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    
    <!-- Fin de la section des signalements -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Testimonials</span>
                        <h2>What Customers Say?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="testimonial-slider owl-carousel">
                        <div class="ts-item">
                            <p>After a construction project took longer than expected, my husband, my daughter and I
                                needed a place to stay for a few nights. As a Chicago resident, we know a lot about our
                                city, neighborhood and the types of housing options available and absolutely love our
                                vacation at Sona Hotel.</p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5> - Alexander Vasquez</h5>
                            </div>
                            <img src="img/testimonial-logo.png" alt="">
                        </div>
                        <div class="ts-item">
                            <p>After a construction project took longer than expected, my husband, my daughter and I
                                needed a place to stay for a few nights. As a Chicago resident, we know a lot about our
                                city, neighborhood and the types of housing options available and absolutely love our
                                vacation at Sona Hotel.</p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5> - Alexander Vasquez</h5>
                            </div>
                            <img src="img/testimonial-logo.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
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
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- Le script qui affiche le formulaire d'inscription --}}
<script>
    $(document).ready(function(){
        $("#inscription-btn").click(function(){
            $("#booking-form-container").find('.booking-form').show();
            $(this).hide();
            $("#connexion-btn").hide();

        });
    });
</script>

{{-- Le script qui permet de faire suivant et précédent --}}
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




