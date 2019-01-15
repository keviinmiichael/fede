@extends('admin.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li>Home</li>
        <li><a href="/admin/categories">Categorías</a></li>
        <li><a href="/admin/categories/{{$category->id}}/subcategories">{{ $category->value }}</a></li>
        <li>Subcategorías</li>
    </ol>
@endsection

@section('title')
    <i class="fa-fw fa fa-list"></i> {{ $category->value }} 
    <sapn>&gt; Subcategorías</span>
@endsection

@section('header-buttons')
    <a href="/admin/categories/{{$category->id}}/subcategories/create" class="btn btn-success pull-right"><span class="fa fa-plus"></span> Agregar</a>
@endsection

@section('widget-title')
    <h2>Listado de Subcategorías</h2>
@endsection

@section('widget-body')
    <table id="datatable" class="table table-striped table-hover" width="100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody><!--Datatable--></tbody>
    </table>
    <input type="hidden" name="category_id" id="category_id" value="{{ $category->id }}">
@endsection

@section('scripts')
    <script src="/js/admin/subcategories.js"></script>
@endsection