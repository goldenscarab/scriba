@extends('front.template.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default opacity">
            <div class="panel-heading">
                <h5 class="text-danger">Ouups, erreur 500</h5>
            </div>
            <div class="panel-body">
                <p>
                    Une erreur interne est survenue !! <br> <br>
                    Retour à la page d'accueil : 
                    <a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection