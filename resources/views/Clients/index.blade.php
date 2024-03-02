@extends('layouts.master2')

@section('content')

<section class="hp-room-section">
    <div class="container">
        <div class="hp-room-items">
            <div class="row">
                
                @foreach($clients as $client)
                    <div class="col-lg-3 col-md-6 mb-4"> <!-- Ajout de la classe mb-4 pour l'espace -->
                        <div class="hp-room-item set-bg" data-setbg="img/room/room-b2.jpg">
                            <div class="hr-text">
                                <h3>{{ $client->nom}}</h3>
                                <h2 style="font-size: 20px;">Signalé le : {{ \Carbon\Carbon::parse($client->created_at)->format('j/m/Y') }}</h2>
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
                                        {{-- <tr>
                                            <td class="r-o">Services:</td>
                                            <td>{{ $client->nom }}</td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                                <b style="font-size: 12px;" class="r-o bg-white">Cliquer sur <span style="color: #dfa974;">Voir détail</span> pour plus de détails</b>
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



    

@endsection