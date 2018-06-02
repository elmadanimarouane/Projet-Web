@extends('template')

@section('contenu')
<link rel="stylesheet" href="{{ asset('css/formstyle.css') }}">

<body style="height: 100%">
<div class="container">
    <form id="contact" action="" method="post">
        <h3>Ajouter un pronostic</h3>
        <fieldset>
            {!! Form::open(['route' => 'article.store']) !!}
            <div class="form-group {!! $errors->has('firstteam') ? 'has-error' : '' !!}">
            {!! Form::text('firstteam', null, ['class' => 'form-control', 'placeholder' => "Première equipe"]) !!}
            {!! $errors->first('firstteam', '<small class="help-block">:message</small>') !!}
            </div>
        </fieldset>
        <fieldset>
            <div class="form-group {!! $errors->has('secondteam') ? 'has-error' : '' !!}">
                {!! Form::text('secondteam', null, ['class' => 'form-control', 'placeholder' => "Deuxième equipe"]) !!}
                {!! $errors->first('secondteam', '<small class="help-block">:message</small>') !!}            </div>
        </fieldset>
        <fieldset>
            <h4>Jour du match</h4>
            <div class="form-group {!! $errors->has('dateofmatch') ? 'has-error' : '' !!}">
                {!! Form::date('dateofmatch') !!}
                {!! $errors->first('dateofmatch', '<small class="help-block">:message</small>') !!}            </div>
        </fieldset>
        <fieldset>
            <h4>Heure du match</h4>
            <div class="form-group {!! $errors->has('timeofmatch') ? 'has-error' : '' !!}">
                {!! Form::time('timeofmatch') !!}
                {!! $errors->first('dateofmatch', '<small class="help-block">:message</small>') !!}            </div>
        </fieldset>
        <fieldset>
            <div class="form-group {!! $errors->has('content') ? 'has-error' : '' !!}">
            {!! Form::textarea ('content', null, ['class' => 'form-control', 'placeholder' => 'Expliquez votre pronostic ici...']) !!}
            {!! $errors->first('content', '<small class="help-block">:message</small>') !!}
            </div>
        </fieldset>
        <fieldset>
            <div class="form-group {!! $errors->has('verdict') ? 'has-error' : '' !!}">
                {!! Form::text ('verdict', null, ['class' => 'form-control', 'placeholder' => 'Verdict sur le pronostic']) !!}
                {!! $errors->first('content', '<small class="help-block">:message</small>') !!}
            </div>
        </fieldset>
        <fieldset>
            <h4>Côte du pronostic</h4>
            <div class="form-group {!! $errors->has('odd') ? 'has-error' : '' !!}">
                {!! Form::number ('odd', null, ['class' => 'form-control','step' => '0.01']) !!}
                {!! $errors->first('odd', '<small class="help-block">:message</small>') !!}
            </div>
        </fieldset>
        <fieldset>
            {!! Form::button("Poster l'article", ['type' => 'submit']) !!}
            {!! Form::close() !!}
        </fieldset>
    </form>
</div>



</body>
@endsection