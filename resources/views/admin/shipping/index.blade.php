@extends('admin.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li>Home</li><li>Envíos</li>
    </ol>
@endsection

@section('title')
    <i class="fa-fw fa fa-truck"></i> Envíos
    <sapn>&gt; Listado</span>
@endsection

@section('widget-title')
    <h2>Listado de Envíos</h2>
@endsection

@section('widget-body')
    <table id="datatable" class="table table-striped table-hover" width="100%">
        <thead>
            <tr>
                <th>Nº</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Zona</th>
                <th>Estado del envío</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody><!--Datatable--></tbody>
    </table>
@endsection

@section('scripts')
    <script src="/js/admin/shipping.js"></script>
@endsection
