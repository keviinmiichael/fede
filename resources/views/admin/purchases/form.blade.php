@extends('admin.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li>Home</li>
        <li><a href="/admin/categories">Compras</a></li>
        <li>{{ $viewConfig['accion'] }}</li>
    </ol>
@endsection

@section('title')
    <i class="fa-fw fa fa-list"></i> Compras
    <sapn>&gt; {{ $viewConfig['accion'] }}</span>
@endsection

@section('widget-title')
    <h2>{{ $viewConfig['accion'] }}</h2>
@endsection

@section('widget-body')
    {!! Form::model($purchase, $formOptions) !!}
        <fieldset>
            <legend>Datos</legend>
            <div class="row">
                <section class="col col-md-4 col-sm-12 col-xs-12">
                    <label class="label">Tipo de cliente:</label>
                    <label class="input">
                    {!! Form::select('client_type', [1 => 'Cliente Registrado', 2 => 'Nuevo Cliente'], null, ['class' => 'form-control']) !!}
                    </label>
                </section>
                <section class="col col-md-4 col-sm-4 col-xs-12 type_client" data-type-client="1">
                    <label class="label">Cliente:</label>
                    <label class="input">
                    {!! Form::select('client_id', \App\Client::orderBy('name')->pluck('email', 'id')->toArray(), null, ['class' => 'form-input select2']) !!}
                    </label>
                </section>
                <section class="col col-md-4 col-sm-4 col-xs-12 type_client" data-type-client="2" style="display: none">
                    <label class="label">Cliente:</label>
                    <label class="input">
                    {!! Form::text('client', null, ['class' => 'form-input']) !!}
                    </label>
                </section>
                <section class="col col-md-4 col-sm-4 col-xs-12">
                    <label class="label">Descuento:</label>
                    <label class="input">
                    {!! Form::text('discount', null, ['class' => 'form-input']) !!}
                    </label>
                </section>
        </fieldset>
        <fieldset>
            <legend>Productos</legend>
            <table id="products" class="table table-striped table-bordered table-hover smart-form" width="100%" style="margin-bottom: 20px">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
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
                        <label class="input"><input name="price[]" type="text" value="" class="price" readonly /></label>
                    </td>
                    <td>
                        <label class="input"><input name="amount[]" type="text" value="" class="amount" data-type="integer" /></label>
                    </td>
                    <td>
                        <label class="input"><input class="total" name="total[]" type="text" value="" data-type="float" readonly /></label>
                        <input type="hidden" name="product_id[]" value="" />
                    </td>
                    <td><a class="btn btn-danger" style="padding: 5px 10px" onclick="Purchase.removeRow(this)"><i class="fa fa-trash-o"></i></a></td>
                </tr>
            </tbody>
        </table>
        </fieldset>
    {!! Form::close() !!}

    <textarea id="itemTpl" class="hidden">@include('admin.purchases._row')</textarea>

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
@endsection

@section('scripts')
<script>
        var codesAutocomplete = {!! $codesAutocomplete !!};
        var namesAutocomplete = {!! $namesAutocomplete !!};
    </script>
    <script src="/js/admin/purchase.js"></script>
@endsection
