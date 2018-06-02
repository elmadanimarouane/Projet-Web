@extends('template')

@section('contenu')
<style>
    h1 {
        text-align: center;
        margin: 0 0 20px;
        font-size: 48px;
        letter-spacing: 2px;
        padding: 50px 0;
    }
</style>
<h1 style="color: white">ACCUEIL</h1>
@yield('articles')
@endsection