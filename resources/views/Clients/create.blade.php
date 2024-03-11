@extends('layouts.master')

@section('content')

<section>
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-3">
                    <h2>Description du signalement</h2>
                    <p>Remplissez le formulaire ci-dessous pour signaler un client.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <img src="clientCreate.jpg" class="img-fluid" alt="Image Client">
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

                    <form method="POST" action="{{route('client.store')}}" enctype="multipart/form-data">

                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nomClient">Nom du client :</label>
                                    <input type="text" class="form-control" id="nomClient" name="nom" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pays">Pays d'origine :</label>
                                    <input type="text" class="form-control" id="pays" name="pays" required>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telephone">Téléphone :</label>
                                    <input type="text" class="form-control" id="telephone" name="telephone" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="telephone">Image :</label>
                                    <input type="file" class="form-control" id="image" name="image" required>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dateArriver">Date d'arrivée :</label>
                                    <input type="date" class="form-control" id="dateArriver" name="dateArriver" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dateDepart">Date départ :</label>
                                    <input type="date" class="form-control" id="dateDepart" name="dateDepart" required>
                                </div>
                            </div>

                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description de l'incident:</label>
                                    <textarea class="form-control" id="description" name="description" rows="6" placeholder="Expliquez la raison du signalement"></textarea>
                                </div>
                                
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Soumettre</button>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</section>
<br><br>


@endsection