@extends('template')

@section('contenu')
<link rel="stylesheet" href="{{ asset('css/formstyle.css') }}">

<body style="height: 100%">
<div class="container">
    <form id="contact" method="post" action="{{action('UserController@update', $id)}}">
        <h3>Modifier le statut de l'Utilisateur</h3>
        <fieldset>
            {!! Form::open(['route' => 'users.store']) !!}
            {{Form::model($user, ['route'=>['users.update', $user->id], 'method' => 'PATCH'])}}
            <h4>Statut</h4>
            <div class="form-group {!! $errors->has('stateofbet') ? 'has-error' : '' !!}">
                {!! Form::select('type', array('default' => 'Utilisateur', 'admin' => 'Administrateur')); !!}
                {!! $errors->first('type', '<small class="help-block">:message</small>') !!}            </div>
        </fieldset>
        <fieldset>
            {!! Form::button("Modifier", ['type' => 'submit']) !!}
            {!! Form::close() !!}
        </fieldset>
    </form>
</div>



</body>
@endsection