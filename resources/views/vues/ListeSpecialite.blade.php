@extends('layouts.master')
@section('content')

    <div class="container">


    <table class="table table-bordered table-striped" id="myTable">
        <thead>
        <tr>
            <th scope="col">Id Specialite</th>
            <th scope="col">Libellé Spécialité</th>
        </tr>
        </thead>
        <tbody>
        <!-- On affiche les informations dans le tableau avec une boucle -->
        @foreach($mesSpecialite as $uneSpecialite)
            <tr>
                <td> {{ $uneSpecialite->id_specialite }}</td>
                <td> {{ $uneSpecialite->lib_specialite }}</td>
                <td> <a href="{{url('/modifier/'.$idpraticien.'/'.$uneSpecialite->id_specialite)}}"><button>modifier</button></a> </td>
                <td> <a href="{{url('/supprimer/'.$idpraticien.'/'.$uneSpecialite->id_specialite)}}"><button>supprimer</button></a> </td>
            </tr>
        @endforeach
        </tbody>
    </table>
            <form method="post" action="">
                <input type="hidden" name="{{$idpraticien}}">

                <select name="listeAjout">
                    <option value="">Ajouter une spécialité</option>

                @foreach($mesSpe as $uneSpe)
                    <!-- On affiche ces informations dans une option, $unType->lib_type_praticien correspond au libellé du type de praticien -->
                        <option value="{{ $uneSpe->id_specialite }}">{{ $uneSpe->lib_specialite }}</option>
                    @endforeach
                </select>
                <input type="submit">
            </form>
    </div>
@endsection
