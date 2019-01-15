@extends('front.app')

@section('title', 'Error :/')

@section('head')
    <link href="/js/plugin/stepper/jquery.fs.stepper.css" rel="stylesheet">
    <style>
        .stepper {width: 120px; margin: 0}
        .table-primary th {
            background-color: #f69284;
            color: #fff;
            font-weight: bold;
        }
        .table-primary th, .table-primary tbody td {text-align: center;}
        .table-primary tfoot .total {text-align: center;}
    </style>
@endsection

@section('styles')
    <link href="/js/plugin/stepper/jquery.fs.stepper.css" rel="stylesheet">
    <style>
        .stepper {width: 70px}
    </style>
@endsection

@section('content')
    <h2 style="text-align: center;">Página en mantenimiento</h2>
    <p style="font-size: 18px; text-align: center; margin: 80px 0">Estamos trabajando para brindarle un mejor servicio.<br>Sepa disculpar las molestias.</p>
@endsection
