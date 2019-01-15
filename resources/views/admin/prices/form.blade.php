@extends('admin.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li>Home</li><li>Precios</li>
    </ol>
@endsection

@section('title')
    <i class="fa-fw fa fa-dollar"></i> Precios 
    <sapn>&gt; Carga</span>
@endsection

@section('header-buttons')
    <a href="/admin/categories/create" class="btn btn-success pull-right"><span class="fa fa-plus"></span> Agregar</a>
@endsection

@section('widget-title')
    <h2>Carga de stock</h2>
@endsection

@section('widget-body')
    <form id="formPrice" action="/admin/prices" method="post">
        {{ csrf_field() }}
        <table id="prices" class="table table-striped table-bordered table-hover smart-form" width="100%" style="margin-bottom: 20px">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Costo</th>
                    <th>Tipo</th>
                    <th>Margen %</th>
                    <th>Precio</th>
                    <th><i class="fa fa-times"></i></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label class="input"><input name="code[]" type="text" value="" /></label>
                    </td>
                    <td>
                        <label class="input"><input name="name[]" type="text" value="" /></label>
                    </td>
                    <td>
                        <label class="input"><input name="cost[]" type="text" value="" class="cost" data-type="float" /></label>
                    </td>
                    <td>
                        <select class="form-control" name="price_format[]" style="min-width: 100px">
                            <option value="1">Margen</option>
                            <option value="2">Precio fijo</option>
                        </select>
                    </td>
                    <td>
                        <label class="input"><input name="profit_margin[]" type="text" value="" data-type="float" /></label>
                    </td>
                    <td>
                        <label class="input"><input class="price" name="price[]" type="text" value="" data-type="float" readonly /></label>
                        <input type="hidden" name="product_id[]" value="" />
                    </td>
                    <td><a class="btn btn-danger" style="padding: 5px 10px" onclick="Prices.removeRow(this)"><i class="fa fa-trash-o"></i></a></td>
                </tr>
            </tbody>
        </table>
    </form>
    <div class="widget-footer smart-form">
        <div class="btn-group">
            <a id="guardar" class="btn btn-sm btn-primary" style="margin-right: 10px">
                <i class="fa fa-save"></i> Guardar
            </a> 
            <a class="btn btn-success btn-sm addItem">
                <i class="fa fa-plus"></i> Agregar
            </a>
        </div>
    </div>
    <textarea id="itemTpl" class="hidden">@include('admin.prices._row')</textarea>
@endsection

@section('scripts')
    <script>
        var codesAutocomplete = {!! $codesAutocomplete !!};
        var namesAutocomplete = {!! $namesAutocomplete !!};
    </script>
    <script src="/js/admin/prices.js"></script>
@endsection

