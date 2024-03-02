@extends('layouts.master2')

@section('content')
<section>
    <div class="container">
        <!-- Breadcrumb Section Begin -->
    
        <section>
            <div class="row">
                <div class="col-md-5">
                    <a href="{{route('hotel.accueil')}}" class="btn btn-sm btn-secondary">Retour</a>

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

                    <p class="mt-3 mb-3 text-center bg-secondary text-white px-1 py-1">Profil</p>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Hôtel</th>
                                            <td>{{$hotels->nom}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Pays</th>
                                            <td>{{$hotels->pays}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Adresse</th>
                                            <td>{{$hotels->adresse}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>{{$hotels->email}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Téléphone</th>
                                            <td>{{$hotels->telephone}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Numéro d'identification fiscale</th>
                                            <td>{{$hotels->ifu}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Responsable</th>
                                            <td>{{$hotels->responsable}}</td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editProfileModal">Modifier profil</button>

                </div>
                {{-- MES ANNONCES --}}
                <div class="col-md-7" style="margin-top: 30px;">

                       {{-- Message de succès --}}
                       <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            @if (Session::get('success_messagee'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ Session::get('success_messagee') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true" style="font-size: 30px;">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-2"></div>
                    </div>


                    <!-- Home Room Section Begin -->
                    {{-- <section class="hp-room-section">
                        <div class="container-fluid">
                            <div class="hp-room-items">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="hp-room-item set-bg" data-setbg="img/room/room-b1.jpg">
                                            <div class="hr-text">
                                                <h3>Double Room</h3>
                                                <h2>199$<span>/Pernight</span></h2>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="r-o">Size:</td>
                                                            <td>30 ft</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="r-o">Capacity:</td>
                                                            <td>Max persion 5</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="r-o">Bed:</td>
                                                            <td>King Beds</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="r-o">Services:</td>
                                                            <td>Wifi, Television, Bathroom,...</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <a href="#" class="primary-btn">More Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="hp-room-item set-bg" data-setbg="img/room/room-b2.jpg">
                                            <div class="hr-text">
                                                <h3>Premium King Room</h3>
                                                <h2>159$<span>/Pernight</span></h2>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="r-o">Size:</td>
                                                            <td>30 ft</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="r-o">Capacity:</td>
                                                            <td>Max persion 5</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="r-o">Bed:</td>
                                                            <td>King Beds</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="r-o">Services:</td>
                                                            <td>Wifi, Television, Bathroom,...</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <a href="#" class="primary-btn">More Details</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </section>           --}}
                    <p class="mt-3 mb-3 text-center bg-secondary text-white px-1 py-1">Mes annonces</p>
                   
                    <div class="container">
                        <div class="row">
                            @foreach($clients->chunk(2) as $chunk)
                            <div class="col-md-6">
                                @foreach($chunk as $client)
                                <div class="card mb-3">
                                    <img src="{{ $client->photo }}" class="card-img-top" alt="{{ $client->nom }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $client->nom }}</h5>
                                        <p class="card-text">Téléphone: {{ $client->telephone }}</p>
                                        <p class="card-text">Nationalité: {{ $client->pays }}</p>
                                        <p class="card-text">Période: <span style="font-size: 15px;">  {{ \Carbon\Carbon::parse($client->dateArriver)->format('j/m/Y') }} au {{ \Carbon\Carbon::parse($client->dateDepart)->format('j/m/Y') }}

                                        </span></p>

                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-sm btn-info mr-1" data-toggle="modal" data-target="#detailModal{{ $client->id }}">Détail</button>
                                            <button type="button" class="btn btn-sm btn-success mr-1">Valider</button>
                                            <button type="button" class="btn btn-sm btn-warning mr-1" data-toggle="modal" data-target="#modifierModal{{ $client->id }}">Modifier</button>
                                            <button type="button" class="btn btn-sm btn-danger">Annuler</button>
                                        </div>
                                    </div>
                                </div>


                                <!-- Modal pour les détails -->
                                    <div class="modal fade" id="detailModal{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $client->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="detailModalLabel{{ $client->id }}">Détails du client : <b> {{ $client->nom }}</b></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Contenu des détails du client -->
                                                    <p>Téléphone: {{ $client->telephone }}</p>
                                                    <p>Nationalité: {{ $client->pays }}</p>
                                                    <p>Période: {{ \Carbon\Carbon::parse($client->dateArriver)->format('j/m/Y') }} au {{ \Carbon\Carbon::parse($client->dateDepart)->format('j/m/Y') }}</p>
                                                    <!-- Ajoutez d'autres détails ici -->

                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><b>Description</b></h5>
                                                            <p class="card-text">{{ $client->description }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Fin Modal pour les détails -->


                                <!-- Modal pour la modification des signalements-->
                                    <div class="modal fade" id="modifierModal{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="modifierModalLabel{{ $client->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modifierModalLabel{{ $client->id }}">Modifier les informations de : <b> {{ $client->nom }}</b></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Formulaire de modification -->
                                                    <form method="post" action="{{ route('signalement.update', ['client' => $client->id]) }}">

                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $client->id }}">

                                                        <div class="form-row">
                                                            <!-- Première ligne d'inputs -->
                                                            <div class="form-group col-md-6">
                                                                <label for="nom">Nom</label>
                                                                <input type="text" class="form-control" id="nom" name="nom" value="{{ $client->nom }}">
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="pays">Nationalité</label>
                                                                <input type="text" class="form-control" id="pays" name="pays" value="{{ $client->pays }}">
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="form-row">
                                                            <!-- Deuxième ligne d'inputs -->
                                                            <div class="form-group col-md-6">
                                                                <label for="telephone">Téléphone</label>
                                                                <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $client->telephone }}">
                                                            </div>
                                                        
                                                        </div>

                                                        <div class="form-row">
                                                            <!-- Deuxième ligne d'inputs -->
                                                            <div class="form-group col-md-6">
                                                                <label for="dateArriver">Date d'arrivée</label>
                                                                <input type="date" class="form-control" id="dateArriver" name="dateArriver" value="{{ $client->dateArriver }}">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="dateDepart">Date de départ</label>
                                                                <input type="date" class="form-control" id="dateDepart" name="dateDepart" value="{{ $client->dateDepart }}">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="description">Description de l'incident:</label>
                                                                    <textarea class="form-control" id="description" name="description" rows="6">{{ $client->description }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- Ajoutez d'autres inputs selon vos besoins -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-warning">Modifier</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                <!-- Fin Modal pour la modification des signalements-->

                                @endforeach
                            </div>
                            @endforeach
                        </div>
                        <br>
                        {{-- LA PAGINATION --}}
                        <nav aria-label="Page navigation" class="mb-3">
                            <ul class="pagination justify-content-center">
                                @if ($clients->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link" aria-hidden="true">&laquo; Précédent</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $clients->previousPageUrl() }}"
                                            rel="prev" aria-label="Précédent">&laquo; Précédent</a>
                                    </li>
                                @endif

                                @if ($clients->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $clients->nextPageUrl() }}"
                                            rel="next" aria-label="Suivant">Suivant &raquo;</a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link" aria-hidden="true">Suivant &raquo;</span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                    
                    
                </div>
            </div>
        </section>
    </div>
</section>




<!-- Modal pour modifier un profil -->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Modifier profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editProfileForm" method="post" action="{{ route('hotel.profil.update', ['hotel' => $hotels->id]) }}">

                @csrf

                <div class="modal-body">
                    <!-- Champs du formulaire -->
                    <input type="hidden" id="hotelId" name="id" value="{{$hotels->id}}">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hotelName">Hôtel</label>
                                <input type="text" class="form-control" id="hotelName" name="nom" value="{{$hotels->nom}}">
                            </div>
                            
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hotelCountry">Pays</label>
                                <input type="text" class="form-control" id="hotelCountry" name="pays" value="{{$hotels->pays}}">
                            </div>
                           
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hotelAddress">Adresse</label>
                                <input type="text" class="form-control" id="hotelAddress" name="adresse" value="{{$hotels->adresse}}">
                            </div>
                            
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="responsable">Responsable</label>
                                <input type="text" class="form-control" id="responsable" name="responsable" value="{{$hotels->responsable}}">
                            </div>
        
                        </div>
                    </div>
                    
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telephone">Téléphone</label>
                                <input type="text" class="form-control" id="telephone" name="telephone" value="{{$hotels->telephone}}">
                            </div>
                            
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ifu">Numéro d'identification fiscale</label>
                                <input type="text" class="form-control" id="ifu" name="ifu" value="{{$hotels->ifu}}">
                            </div>
                            
                        </div>
                    </div>
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection