@extends('front.template.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default opacity">
            <div class="panel-heading">
                <h5 class="text-danger">Ouups, erreur 404</h5>
            </div>
            <div class="panel-body">
                <p class="pronounced-white">
                    La page demandée n'existe pas !! <br> <br>
                    Retour à la page d'accueil : 
                    <a class="pronounced-white" href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i></a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection