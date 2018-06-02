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
<h1>UTILISATEURS</h1>

<table>
    <thead>
    <tr>
        <th scope="col">Nom d'utilisateur</th>
        <th scope="col">Statut</th>
        <th scope="col">Inscrit depuis le</th>
        <th scope="col">Modifier</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users->reverse() as $user)
    <td>{{ $user->name }}</td>
    @if($user->type == "admin")
    <td>Administrateur</td>
    @else
    <td>Membre</td>
    @endif
    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y')}}</td>
    <td> {!! link_to_route('users.edit', "Changer le statut", [$user->id], ['class' => 'button button-inline button-small button-warning']) !!}</td>
    </tbody>
    @endforeach
</table>
</body>
@endsection
