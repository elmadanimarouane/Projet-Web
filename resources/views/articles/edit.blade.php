@extends('template')

@section('contenu')
<link rel="stylesheet" href="{{ asset('css/formstyle.css') }}">

<body style="height: 100%">
<div class="container">
    <form id="contact" method="post" action="{{action('ArticleController@update', $id)}}">
        <h3>Modifier l'article</h3>
        <fieldset>
            {!! Form::open(['route' => 'article.store']) !!}
            {{Form::model($article, ['route'=>['article.update', $article->id], 'method' => 'PATCH'])}}
            <div class="form-group {!! $errors->has('firstteam') ? 'has-error' : '' !!}">
                {!! Form::text('firstteam') !!}
                {!! $errors->first('firstteam', '<small class="help-block">:message</small>') !!}
            </div>
        </fieldset>
        <fieldset>
            <div class="form-group {!! $errors->has('secondteam') ? 'has-error' : '' !!}">
                {!! Form::text('secondteam', null, ['class' => 'form-control']) !!}
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
                {!! Form::textarea ('content', null, ['class' => 'form-control']) !!}
                {!! $errors->first('content', '<small class="help-block">:message</small>') !!}
            </div>
        </fieldset>
        <fieldset>
            <div class="form-group {!! $errors->has('verdict') ? 'has-error' : '' !!}">
                {!! Form::text ('verdict', null, ['class' => 'form-control']) !!}
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
            {!! Form::button("Modifier l'article", ['type' => 'submit']) !!}
            {!! Form::close() !!}
        </fieldset>
</div>



</body>
@endsection