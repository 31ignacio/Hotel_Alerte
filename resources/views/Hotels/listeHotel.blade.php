@extends('layouts.master2')

@section('content')

<section class="hp-room-section">
   
    <div class="container">
        {{-- <h3 class="text-center my-3">Liste des Hôtels</h3> --}}
        
        <div class="menu">
            <select class="form-control" id="category1" onchange="showHotels('category1')">
                <option value="none">Sélectionner un hôtel</option>
                <option value="luxe">Hôtels du Bénin</option>
                <option value="standard">Hôtels du Togo</option>
            </select>
        </div>
    
        <div class="hotel-list" id="luxe-hotels">
            <h3 class="mt-3 mb-3 text-center">Hôtels du Bénin</h3>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Pays</th>
                            <th scope="col">Hôtel</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach ($hotelsBenin as $benin)
                    <tbody>
                        <tr>
                            <td><span class="badge badge-success">{{$benin->pays}}</span></td>
                            <td>{{$benin->nom}}</td>
                            <td>{{$benin->telephone}}</td>
                            <td>{{$benin->adresse}}</td>
                            <td><a href="#" class="btn btn-sm btn-primary">Voir Détails</a></td>
                        </tr>
                        <!-- Ajoutez d'autres hôtels de catégorie de luxe -->
                    </tbody>
                    @endforeach
    
                </table>
            </div>
            
        </div>
    
        <div class="hotel-list" id="standard-hotels">
            <h3 class="mt-3 mb-3 text-center">Hôtels du togo</h3>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Pays</th>
                            <th scope="col">Hôtel</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach ($hotelsTogo as $togo)
                    <tbody>
                        <tr>
                            <td><span class="badge badge-warning">{{$togo->pays}}</span></td>
                            <td>{{$togo->nom}}</td>
                            <td>{{$togo->telephone}}</td>
                            <td>{{$togo->adresse}}</td>
                            <td><a href="#" class="btn btn-sm btn-primary">Voir Détails</a></td>
                        </tr>
                        <!-- Ajoutez d'autres hôtels de catégorie de luxe -->
                    </tbody>
                    @endforeach
    
                </table>
            </div>
            
        </div>
    </div>
    
    
    
</section> <br><br><br><br><br><br><br><br><br>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    .menu {
        margin-bottom: 20px;
    }
    .hotel-list {
        display: none;
    }
    @media (min-width: 576px) {
        .hotel-list {
            margin-top: 20px;
        }
    }
</style>

<script>
    function showHotels(category) {
        var selectedCategory = document.getElementById(category).value;
        var hotelLists = document.querySelectorAll('.hotel-list');

        hotelLists.forEach(function(list) {
            list.style.display = 'none';
        });

        document.getElementById(selectedCategory + '-hotels').style.display = 'block';
    }

    // Afficher la liste des hôtels de luxe par défaut
    window.onload = function() {
        document.getElementById('luxe-hotels').style.display = 'block';
    };
</script>
@endsection