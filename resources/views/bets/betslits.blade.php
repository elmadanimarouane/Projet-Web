@extends('template')

@section('contenu')



@if(isset($info))
<div class="row alert alert-info">{{ $info }}</div>
@endif


<head>

    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="{{ asset('css/betsstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttonstyle.css') }}">
    <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css'>
    <link rel='stylesheet prefetch' href='http://rawgit.com/skidding/obvious-buttons/master/lib/dragdealer/dragdealer.css'>


</head>

<body>
<h1>VOS PARIS</h1>

<table>
    @if(Auth::check())
    <a href="{{ URL::route('bets.create') }}" class="button button-inline button-small button-success" style="float: right; margin-bottom: 5px; margin-right: 5px"><span>Ajouter un pari</span></a>
    @endif
    <thead>
    <tr>
        <th scope="col">Match</th>
        <th scope="col">Paris</th>
        <th scope="col">Mise</th>
        <th scope="col">Cote</th>
        <th scope="col">état</th>
        <th scope="col">Gains/Pertes</th>
        <th scope="col">modifier</th>
        <th scope="col">supprimer</th>
    </tr>
    </thead>
    <tbody>
    @foreach($bets->where('user_id','=', Auth::user()->id)->reverse() as $bet)
    <td>{{ $bet->libmatch }}</td>
    <td>{{ $bet->libbet }}</td>
    <td>{{ $bet->betsum }} €</td>
    <td>{{ $bet->oddofbet }}</td>
    @if($bet->stateofbet == "wait")
    <td> EN ATTENTE </td>
    <td>0 €</td>
    @endif
    @if($bet->stateofbet == "won")
    <td style="color: green">GAGNÉ</td>
    <?php
    $total = 0;
    $total = $bet->betsum * $bet->oddofbet;
    ?>
    <td style="color: green">{{ $total }} €</td>
    @endif
    @if($bet->stateofbet == "lost")
    <td style="color: red">PERDU</td>
    <?php
    $total = 0;
    $total = - ($bet->betsum);
    ?>
    <td style="color: red">{{ $total }} €</td>
    @endif
    <td> {!! link_to_route('bets.edit', "Modifier", [$bet->id], ['class' => 'button button-inline button-small button-warning']) !!}</td>
    <form method="POST" action="{{ route('bets.destroy', [$bet->id]) }}">
    <td> {{ csrf_field() }}
        {{ method_field('DELETE') }}
        {!! Form::submit('Supprimer', ['class' => 'button button-inline button-small button-danger', 'onclick' => 'return confirm(\'Voulez-vous vraiment supprimer ce pari ?\')']) !!}</td>
    </tbody>
    @endforeach
</table>
</body>
@endsection
