@extends('accueil')

@section('articles')
<link rel="stylesheet" href="{{ asset('css/articlestyle.css') }}">
@if(isset($info))
<div class="row alert alert-info">{{ $info }}</div>
@endif
@foreach($articles as $article)
<body>
<div class="form">

    <div class="tab-content">
        <article>
            <div>
                <header>
                    <h1 style="color: whitesmoke">{{ $article->firstteam }} VS {{ $article->secondteam }}</h1>
                    <h2>{{ \Carbon\Carbon::parse($article->dateofmatch)->format('d/m/Y')}} à {{ \Carbon\Carbon::parse($article->timeofmatch)->format('H:i')}}</h2>
                </header>
                <hr>
                <section>
                    <p>{{ $article->content }}</p>
                    <p style="font-weight: bold">Pronostic : {{ $article->verdict }} à {{ $article->odd }}
                        @if(Auth::check() and Auth::user()->isAdmin())
                    <form method="POST" action="{{ route('article.destroy', [$article->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        {!! Form::submit('Supprimer cet article', ['class' => 'btn btn-danger btn-xs ', 'onclick' => 'return confirm(\'Voulez-vous vraiment supprimer cet article ?\')']) !!}
                    </form>
                    <form style="padding-left: 40%">
                    {!! link_to_route('article.edit', "Modifier l'article", [$article->id], ['class' => 'btn btn-warning btn-block']) !!}
                    </form>
                    @endif
                    <br>
                    <em>
                        <span></span> Ecrit par {{ $article->user->name }} le {!! $article->created_at->format('d-m-Y') !!}
                    </em>
                </section>
            </div>
        </article>
        <br>
    </div><!-- tab-content -->

</div> <!-- /form -->




</body>
@endforeach
{!! $links !!}
@endsection
