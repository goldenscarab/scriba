@extends('back/template/default')

@section('head')


@stop

<!-- Ajout de scripts -->
@section('scripts')

@stop

@section('content')
<div class="panel panel-default panel-background opacity-3">
    <div class="panel-body">
        <br>
        <h4 class="theme-scriba">
            Bienvenue sur Scriba le webnote par Goldenscarab
            <img class="logo" src="{{ url('/img/goldenscarab.png') }}" alt="">
        </h4>
        <p class="pronounced-white">
            Gardez près de vous vos précieuse note sous 3 formats principaux : 
        </p>
        <ul class="pronounced-white">
            <li>Note Citation</li>
            <li>Note Texte</li>
            <li>Note Code Source</li>
        </ul>
        

            
        
    </div>
</div>

    
    

@endsection