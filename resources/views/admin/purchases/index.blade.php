@extends('admin.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li>Home</li><li>Compras</li>
    </ol>
@endsection

@section('title')
    <i class="fa-fw fa fa-shopping-cart"></i> Compras
    <sapn>&gt; Listado</span>
@endsection

@section('header-buttons')
   <a href="/admin/purchases/create" class="btn btn-success pull-right"><span class="fa fa-plus"></span> Nueva compra</a>
@endsection

@section('widget-title')
    <h2>Listado de Compras</h2>
@endsection

@section('widget-body')
    <table id="datatable" class="table table-striped table-hover" width="100%">
        <thead>
            <tr>
                <th>Nº</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Cliente sin registro</th>
                <th>Total</th>
                <th>Estado del pago</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody><!--Datatable--></tbody>
    </table>
@endsection

@section('scripts')
    <script src="/js/admin/purchases.js"></script>
@endsection
