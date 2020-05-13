@extends('layouts.master')
@section('content')

<div class="container">
    <form method="post" class="col-lg-6" action="{{url("/SignIn")}}">
        @csrf
        <div class="form-group" >
            <label for="login">Login :</label>
            <input type="text" name="login" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" class="form-control" />
        </div>

        <div class="alert alert-danger"></div>
        <button type="submit">Valider</button>

        @if(isset($erreur))
            {{$erreur}}
        @endif
    </form>
</div>

@stop
