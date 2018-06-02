@extends('template')

@section('contenu')
<head>



    <link rel="stylesheet" href="{{ asset('css/accountstyle.css') }}">


</head>

<body>

<body>
<div id="wrap">
    <div id="grid">
        <div class="column column1">
            <div class="step" id="step1">
                <div class="title">
                    <h1>{{ Auth::user()->name }}</h1>
                </div>
                <div class="modify">
                    <i class="fa fa-plus-circle"></i>
                </div>
            </div>
            <div class="content" id="email">
                <form class="go-right">
                    <div>
                        <h4>Inscrit depuis le {{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('d/m/Y')}}<br />
                            Statut :
                        @if(Auth::check() and Auth::user()->isAdmin())
                        Administrateur
                        @else
                        Membre
                        @endif
                        </h4>
                    </div>
                </form>
            </div>
            <div class="step" id="step2">
                <div class="title">
                    <h1>Statistiques</h1>
                </div>
            </div>
            <div class="content" id="address">
                <form class="go-right">
                    <?php $total = 0;
                    $won = 0;
                    $lost = 0;
                    $wait = 0;
                    $sum = 0;
                    $percent = 0;
                    ?>
                    @foreach($bets->where('user_id','=', Auth::user()->id) as $bet)
                    <?php $total++; ?>
                    @if($bet->stateofbet == "wait")
                    <?php $wait++ ?>
                    @endif
                    @if($bet->stateofbet == "lost")
                    <?php $lost++ ?>
                    @endif
                    @if($bet->stateofbet == "won")
                    <?php $won++ ?>
                    @endif
                    @endforeach
                    <?php
                    if ($total > 0){
                        $percent = number_format($won/$total*100,2,'.',',');
                    } ?>
                    <div>
                        <h4>Nombre de paris :<strong> {{ $total }} </strong> <br />
                            Gagné(s) :<strong> {{ $won }} </strong> <br />
                        Perdu(s) : <strong> {{ $lost }} </strong><br />
                        En attente :<strong> {{ $wait }} </strong><br />
                        Pourcentage de victoire : <strong>{{ $percent }} % </strong></h4>
                    </div>
                </form>
            </div>
        </div>
        <div class="column column2">
            <div class="step" id="step3">
                <div class="title">
                    <h1>Relevé de compte</h1>
                </div>
            </div>
            <div class="content" id="shipping">
                <h4> Argent total misé : <strong>{{ $moneyspent = DB::table('bets')->where('user_id', '=' ,Auth::user()->id)->sum('betsum') }} €</strong> <br />
                    Argent gagné :<strong> {{ $moneywon = DB::table('bets')->where('user_id', '=' , Auth::user()->id)->where('stateofbet', '=' , 'won')->sum(DB::raw('oddofbet * betsum')) }} € </strong><br />
                    Balance : @if($moneywon - $moneyspent < 0)
                            <strong style="color: red"> {{ $moneywon - $moneyspent }} € </strong>
                            @endif
                    @if($moneywon - $moneyspent > 0)
                    <strong style="color: green"> {{ $moneywon - $moneyspent }} € </strong>
                    @endif
                    @if($moneywon - $moneyspent == 0)
                    <strong> 0 € </strong>
                    @endif
                </h4>
            </div>
        </div>
        <div class="column column3">
            <div class="step" id="step5">
                <div class="title">
                    <h1>Derniers paris</h1>
                </div>
                <div class="modify">
                    <i class="fa fa-plus-circle"></i>
                </div>
            </div>
            <div class="content" id="final_products">
                <div class="left" id="ordered">
                    <div class="products">
                        <div class="product_image">
                            @foreach($bets->where('user_id','=', Auth::user()->id)->reverse()->slice(0,5) as $bet)
                            <h4> {{ $bet->libmatch }} <br />
                                {{ $bet->libbet }}<br />
                                @if($bet->stateofbet == "wait")
                                <strong>EN ATTENTE</strong>
                                @endif
                                @if($bet->stateofbet == "won")
                                <strong style="color: green;"> GAGNÉ </strong>
                                @endif
                                @if($bet->stateofbet == "lost")
                                <strong style="color: red">PERDU</strong>
                                @endif</h4>
                            @endforeach
                        </div>
                        <div class="product_details">
                            @foreach($bets->where('user_id','=', Auth::user()->id)->reverse()->slice(0,5) as $bet)

                            @endforeach
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

</body>



</body>
@endsection