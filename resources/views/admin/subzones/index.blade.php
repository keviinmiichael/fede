@extends('admin.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li>Home</li>
        <li>{{ $zone->name }}</li>
        <li>Subzonas</li>
    </ol>
@endsection

@section('title')
    <i class="fa-fw fa fa-list"></i> {{ $zone->name }}
    <sapn>&gt; Subzonas</span>
@endsection

@section('header-buttons')
    <a href="/admin/zones/{{$zone->id}}/subzones/create" class="btn btn-success pull-right"><span class="fa fa-plus"></span> Agregar</a>
@endsection

@section('widget-title')
    <h2>Listado de Subzonas</h2>
@endsection

@section('widget-body')
    <table id="datatable" class="table table-striped table-hover" width="100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody><!--Datatable--></tbody>
    </table>
    <input type="hidden" name="zone" id="zone_id" value="{{ $zone->id }}">
@endsection

@section('scripts')
    <script src="/js/admin/subzones.js"></script>
@endsection
