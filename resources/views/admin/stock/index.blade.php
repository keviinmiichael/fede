@extends('admin.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li>Home</li><li>Stock</li>
    </ol>
@endsection

@section('title')
    <i class="fa-fw fa fa-list"></i> Stock
    <sapn>&gt; Listado</span>
@endsection

@section('header-buttons')
    <a href="/admin/stock/create" class="btn btn-success pull-right"><span class="fa fa-pencil"></span> Editar</a>
@endsection

@section('widget-title')
    <h2>Listado de Stock</h2>
@endsection

@section('widget-body')
    <table id="datatable" class="table table-striped table-hover" width="100%">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody><!--Datatable--></tbody>
    </table>
@endsection

@section('scripts')
    <script src="/js/admin/stocks.js"></script>
@endsection
