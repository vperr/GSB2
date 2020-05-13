@extends('layouts.master')
@section('content')

    <div class="container">
        <form method="post" action="{{url("/modifier")}}">
            @csrf
            <input type="hidden" name="idspecialite" value="{{$uneSpecialite->id_specialite}}">
            <input type="hidden" name="idpraticien" value="{{$uneSpecialite->id_praticien}}">
        <label>
            diplome :
            <input name="diplome" type="text" value="{{$uneSpecialite->diplome}}">
        </label>

        <label>
            coef :
            <input name="coef" type="number" step="0.01" value="{{$uneSpecialite->coef_prescription}}">
        </label>

        <input type="submit">
        </form>
    </div>

@endsection
