@extends('layouts.master2')

@section('content')

<section class="hp-room-section">
    <div class="container">

        <h4 class="mt-3 mb-5 text-center bg-secondary text-white px-1 py-1">Liste des signalements</h4>


        <div class=" row">
            <div class="col-md-4">
                <a href="{{route('hotel.accueil')}}" class="btn btn-sm btn-secondary">Retour</a>

            </div>
            <div class="col-md-8">

                <form method="post" action="{{route('client.recherche')}}">

                @csrf
                <div class="form-row">

                    <div class="col-md-4 mb-3">

                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom du client">
                    </div>
                    <div class="col-md-4 mb-3">
                        <input type="text" class="form-control" id="hotel" name="hotel" placeholder="Nom de l'hôtel">
                    </div>
                    <div class="col-md-4 mb-3">
                        <button class="btn btn-secondary btn-block" type="submit">Rechercher</button>
                    </div>
                </div>
            </form>
        </div>
        </div>

       {{--  --}}
        <div class="container">

            <div class="hp-room-items">
                <div class="row">
                    @foreach($clients as $client)
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card">
                                <img src="{{ asset('images/' . $client->photo) }}"
                                class="card-img-top client-photo" alt="{{ $client->nom }}">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><b>{{ $client->nom }}</b></h5>
                                    <p class="card-text" style="font-size: 13px;"><span class="badge badge-warning">Signalé le : {{ \Carbon\Carbon::parse($client->created_at)->format('j/m/Y') }}</span></p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Nationalité:</strong> {{ $client->pays }}</li>
                                        <li class="list-group-item"><strong>Téléphone:</strong> {{ $client->telephone }}</li>
                                        <li class="list-group-item"><strong>Hôtel:</strong> {{ $client->hotel->nom }}</li>
                                    </ul>
                                    <a href="{{ route('client.show', $client->id) }}" class="btn btn-primary btn-block">Voir Détails</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>
         
        </div>

       {{--  --}}

        
        {{-- LA PAGINATION --}}
        <div style="display: flex; justify-content: center;" class="mb-3 mt-3">
            {{$clients->links()}}
        </div>
        
        
        {{-- <nav aria-label="Page navigation" class="mb-3">
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
        </nav> --}}
    </div>
</section>
    {{-- CSS pour donner une card fixe a mes images --}}
    <style>
        .client-photo {
        width: 500px;
        height: 200px;
        object-fit: cover;
        }

    </style>

@endsection