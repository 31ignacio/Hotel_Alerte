<!-- show.blade.php -->
@extends('layouts.master2')

@section('content')
    <section>
        <div class="container mt-2 mb-4">
            <a href="{{route('hotel.accueil')}}" class="btn btn-sm btn-secondary" style="">Retour</a>

            <h3 class="text-center mb-3">Détails du signalement</h3>
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title bg-secondary text-white">Informations du client</h5>

                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">Nom: {{ $client->nom }}</p>
                            <p class="card-text">Signalé le: {{ \Carbon\Carbon::parse($client->created_at)->format('j/m/Y') }}</p>
                            <p class="card-text">Nationalité: {{ $client->pays }}</p>
                            <p class="card-text">Téléphone: {{ $client->telephone }}</p>
                            <p class="card-text">Période: {{ \Carbon\Carbon::parse($client->dateArriver)->format('j/m/Y') }} au {{ \Carbon\Carbon::parse($client->dateDepart)->format('j/m/Y') }}</p>
                            <h5>Description :</h5>
                            <p class="card-text description">{{ $client->description }}</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5 class="card-title bg-secondary text-white">Informations de l'hôtel</h5>

                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">Hôtel: {{ $client->hotel->nom }}</p>
                            <p class="card-text">Pays: {{ $client->hotel->pays }}</p>
                            <p class="card-text">Adresse: {{ $client->hotel->adresse }}</p>

                            <p class="card-text">Email: {{ $client->hotel->email }}</p>

                            <p class="card-text">Téléphone: {{ $client->hotel->telephone }}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .description {
            font-size: 16px;
            line-height: 1.6;
            color: #555; /* Couleur du texte */
            border: 1px solid #ccc; /* Bordure */
            background-color: #f9f9f9; /* Fond */
            padding: 20px; /* Espacement intérieur */
            border-radius: 10px; /* Coins arrondis */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre douce */
            margin-top: 20px; /* Marge supérieure */
            transition: all 0.3s ease; /* Animation de transition */
            }

            .description:hover {
                transform: scale(1.02); /* Effet de zoom au survol */
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Ombre plus prononcée */
            }


        </style>
    </section>
@endsection
