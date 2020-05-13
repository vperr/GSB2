@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="divRecherche">


            <h1 class="titreRecherche">Recherche d'un praticien</h1>

            <h3 class="libellé">Nombre de praticiens : {{ $mesPraticiens->Count()}}</h3>
            <!-- Zone de recherche
                 IMPORTANT : ne pas oublier l'id qui permettent à la fonction de trouver l'input et l'onkeyup d'appeler la fonction
            -->
            <input type="text" name="nomPraticien" class="form-control" id="myInput" onkeyup="rechercheInput()" placeholder="Recherche d'un praticien par nom" autofocus>

            <!-- Liste déroulante
                 IMPORTANT : idem que précédemment
            -->
            <select name="typePraticien" class="form-control" id="mySelect" onchange="rechercheSelect()">

                <!-- On définit une option par défaut avec une valeur égale à ""  -->
                <option value="">Type de praticien</option>

                <!-- On récupère les données à afficher dans la liste (ici avec laravel mais fonctionne avec du php, seulement le foreach sera différent) -->
            @foreach($mesTypes as $unType)
                <!-- On affiche ces informations dans une option, $unType->lib_type_praticien correspond au libellé du type de praticien -->
                    <option value="{{ $unType->lib_type_praticien }}">{{ $unType->lib_type_praticien }}</option>
                @endforeach
            </select>
            <!-- On crée le tableau, ne pas oublier l'id qui permet à la fonction de trouver le tableau  -->
            <table class="table table-bordered table-striped" id="myTable">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Type praticien</th>
                    <th scope="col">Détail Spécialité</th>
                </tr>
                </thead>
                <tbody>
                <!-- On affiche les informations dans le tableau avec une boucle -->
                @foreach($mesPraticiens as $unPraticien)
                    <tr>
                        <td> {{ $unPraticien->id_praticien }}</td>
                        <td> {{ $unPraticien->nom_praticien }}</td>
                        <td> {{ $unPraticien->prenom_praticien }}</td>
                        <td> {{ $unPraticien->lib_type_praticien }}</td>
                        <td>
                            <a href="{{url('/ListeSpecialite/'.$unPraticien->id_praticien)}}">Détail Spécialité</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
