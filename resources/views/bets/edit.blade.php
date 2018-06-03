@extends('template')

@section('contenu')
<link rel="stylesheet" href="{{ asset('css/formstyle.css') }}">

<body style="height: 100%">
<div class="container">
    <form id="contact" method="post" action="{{action('BetsController@update', $id)}}">
        <h3>Modifier le pari</h3>
        <fieldset>
            {!! Form::open(['route' => 'bets.store']) !!}
            {{Form::model($bet, ['route'=>['bets.update', $bet->id], 'method' => 'PATCH'])}}
            <div class="form-group {!! $errors->has('libteam') ? 'has-error' : '' !!}">
                {!! Form::text('libmatch', null, ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('libmatch', '<small class="help-block">:message</small>') !!}
            </div>
        </fieldset>
        <fieldset>
            <div class="form-group {!! $errors->has('libbet') ? 'has-error' : '' !!}">
                {!! Form::text('libbet', null, ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('libbet', '<small class="help-block">:message</small>') !!}
            </div>
        </fieldset>
        <fieldset>
            <h4>Somme misée</h4>
            <div class="form-group {!! $errors->has('betsum') ? 'has-error' : '' !!}">
                {!! Form::number ('betsum', null, ['class' => 'form-control','step' => '0.01', 'required' => 'required']) !!} €
                {!! $errors->first('betsum', '<small class="help-block">:message</small>') !!}
            </div>
        </fieldset>
        <fieldset>
            <h4>Côte du pari</h4>
            <div class="form-group {!! $errors->has('oddofbet') ? 'has-error' : '' !!}">
                {!! Form::number ('oddofbet', null, ['class' => 'form-control','step' => '0.01', 'required' => 'required']) !!}
                {!! $errors->first('oddofbet', '<small class="help-block">:message</small>') !!}
            </div>
        </fieldset>
        <fieldset>
            <h4>Etat du pari</h4>
            <div class="form-group {!! $errors->has('stateofbet') ? 'has-error' : '' !!}">
                {!! Form::select('stateofbet', array('wait' => 'En attente', 'won' => 'Gagné', 'lost' => 'Perdu')); !!}
                {!! $errors->first('dateofmatch', '<small class="help-block">:message</small>') !!}            </div>
        </fieldset>
        <fieldset>
            {!! Form::button("Modifiez votre pari", ['type' => 'submit']) !!}
            {!! Form::close() !!}
        </fieldset>
    </form>
</div>



</body>
@endsection