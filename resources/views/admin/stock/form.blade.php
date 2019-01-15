@extends('admin.app')

@section('head')
    <link rel="stylesheet" href="/js/admin/plugin/bootstrap-select/bootstrap-select.css">
    <style>
        .media-left img {
            width: 30px;
            margin-right: 20px;
        }
        .dropdown-toggle {padding: 6px 25px 6px 12px !important}
    </style>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li>Home</li>
        <li>Stock</li>
    </ol>
@endsection

@section('title')
    <i class="fa-fw fa fa-dropbox"></i> Stock
    <sapn>&gt; Carga</span>
@endsection

@section('widget-title')
    <h2>Carga de stock</h2>
@endsection

@section('widget-body')
    <form id="formStock" action="/admin/stock" method="post">
        {{ csrf_field() }}
        <table id="stock" class="table table-striped table-bordered table-hover smart-form" width="100%" style="margin-bottom: 20px">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Costo</th>
                    <th>Cantidad</th>
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
                        <label class="input"><input name="amount[]" type="text" value="" data-type="int" /></label>
                    </td>
                    <td>
                        <a class="btn btn-danger" style="padding: 5px 10px" onclick="Stock.removeRow(this)">
                            <i class="fa fa-trash-o"></i>
                        </a>
                        <input type="hidden" name="product_id[]" value="0" />
                    </td>
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

    <textarea id="itemTpl" class="hidden">@include('admin.stock._row')</textarea>
@endsection

@section('scripts')
    <script>
        var codesAutocomplete = {!! $codesAutocomplete !!};
        var namesAutocomplete = {!! $namesAutocomplete !!};
    </script>
    <script src="/js/admin/plugin/bootstrap-select/bootstrap-select.js"></script>
    <script src="/js/admin/stock.js"></script>
@endsection
