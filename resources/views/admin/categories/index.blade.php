@extends('admin.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li>Home</li><li>Categorías</li>
    </ol>
@endsection

@section('title')
    <i class="fa-fw fa fa-list"></i> Categorías
    <sapn>&gt; Listado</span>
@endsection

@section('header-buttons')
    <a href="/admin/categories/create" class="btn btn-success pull-right"><span class="fa fa-plus"></span> Agregar</a>
@endsection

@section('widget-title')
    <h2>Listado de Categorías</h2>
@endsection

@section('widget-body')
    <table id="datatable" class="table table-striped table-hover" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody><!--Datatable--></tbody>
    </table>
@endsection

@section('scripts')
    <script src="/js/admin/categories.js"></script>
@endsection
