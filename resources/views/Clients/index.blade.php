@extends('layouts.master2')

@section('content')

<section class="hp-room-section">
    <div class="container">

        <h4 class="mt-3 mb-5 text-center bg-secondary text-white px-1 py-1">Liste des signalements</h4>


        <div class=" row">
            <div class="col-md-4"></div>
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
                @foreach ($clients as $client)
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
                

            </style>


        </div>
    </div>

       {{--  --}}

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
</section>



    
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


@endsection