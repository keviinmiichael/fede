@extends('admin.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li>Home</li><li>Cupones</li>
    </ol>
@endsection

@section('title')
    <i class="fa-fw fa fa-ticket"></i> Cupones
    <sapn>&gt; Listado</span>
@endsection

@section('header-buttons')
    <a href="/admin/coupons/create" class="btn btn-success pull-right"><span class="fa fa-plus"></span> Agregar</a>
@endsection

@section('widget-title')
    <h2>Listado de Cupones</h2>
@endsection

@section('widget-body')
    <table id="datatable" class="table table-striped table-hover" width="100%">
        <thead>
            <tr>
                <th>Creado el</th>
                <th>Código</th>
                <th>Descuento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody><!--Datatable--></tbody>
    </table>
@endsection

@section('scripts')
    <script src="/js/admin/coupons.js"></script>
@endsection
