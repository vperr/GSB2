<!doctype html>
<html lang="fr">
<head>
    <title>Praticiens</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
{!! Html::style('assets/css/bootstrap.css') !!}
{!! Html::style('assets/css/gsb.css') !!}
{!! Html::style('assets/css/bootstrap.css') !!}
<!-- Fonts -->
</head>
<body class="body">
<div class="container">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
                    <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar+ bvn"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">GSB Praticiens</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-target">
                <ul class="nav navbar-nav">
                    @if(Session::get('id') == null)
                    <li class="nav-item"><a class="nav-link" href="{{ url('/SignIn') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Se connecter</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link" href="{{ url('/Deconnexion') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Deconnexion</a></li>
                    @endif
                    @if(Session::get('id') != null)
                    <li class="nav-item"><a class="nav-link" href="{{ url('/RecherchePraticiens') }}" data-toggle="collapse" data-target=".navbar-collapse.in">Praticiens par nom ou spécialité</a></li>
                    @endif

                </ul>
            </div>
        </div><!--/.container-fluid -->
    </nav>
</div>
<br><br>
<div class="container">
    @yield('content')
</div>
{!! Html::script('assets/js/bootstrap.min.js') !!}
{!! Html::script('assets/js/jquery-2.1.3.min.js')  !!}
{!! Html::script('assets/js/ui-bootstrap-tpls.js')  !!}
{!! Html::script('assets/js/bootstrap.js')  !!}
{!! Html::script('assets/js/rechercheTableau.js')  !!}
</body>
</html>
