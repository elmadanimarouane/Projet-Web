@extends('template')

@section('contenu')
<!DOCTYPE html>
<html>
 <body>
<link rel="stylesheet" href="{{ asset('css/betsstyle.css') }}">
<link rel="stylesheet" href="{{ asset('css/accountstyle.css') }}">
<h1>Evolution des gains</h1>

{!! $chart->container() !!}
<script src=//cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
 {!! $chart->script() !!}
 </body>
</html>
@endsection