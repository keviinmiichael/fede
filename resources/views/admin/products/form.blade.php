@extends('admin.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li>Home</li>
        <li><a href="/admin/products">Productos</a></li>
        <li>{{ $viewConfig['accion'] }}</li>
    </ol>
@endsection

@section('title')
    <i class="fa-fw fa fa-th-large"></i> Productos
    <sapn>&gt; {{ $viewConfig['accion'] }}</span>
@endsection

@section('widget-title')
    <h2>{{ $viewConfig['accion'] }}</h2>
@endsection

@section('widget-body')
    {!! Form::model($product, $formOptions) !!}
        <fieldset>
            <legend>Datos</legend>
            <div class="row">
                <section class="col col-md-6 col-sm-12 col-xs-12">
                    <label class="label">Nombre:</label>
                    <label class="input">
                        {!! Form::text('name', null, ['autofocus']) !!}
                    </label>
                </section>
                <section class="col col-md-3 col-sm-12 col-xs-12">
                    <label class="label">Código:</label>
                    <label class="input">
                        {!! Form::text('code', null) !!}
                    </label>
                </section>
                <section class="col col-md-3 col-sm-12 col-xs-12">
                    <label class="label">Descuento:</label>
                    <label class="select">
                        {!! Form::select('discount', [0=>'Sin descuento', 10=>'10%', 20=>'20%', 30=>'30%', 40=>'40%', 50=>'50%', 60=>'60%', 70=>'70%', 80=>'80%', 90=>'90%']) !!}
                        <i></i>
                    </label>
                </section>
            </div>
            <div class="row">
                <section class="col col-md-3 col-sm-12 col-xs-12">
                    <label class="label">Costo:</label>
                    <label class="input">
                        {!! Form::text('cost', null, ['data-type'=>'float']) !!}
                    </label>
                </section>
                <section class="col col-md-3 col-sm-12 col-xs-12">
                    <label class="label">Valor de venta:</label>
                    <label class="select">
                        {!! Form::select('price_format', [1=>'Margen (en función del costo)', 2=>'Precio fijo']) !!}
                        <i></i>
                    </label>
                </section>
                <section class="col col-md-3 col-sm-12 col-xs-12">
                    <label class="label">Margen:</label>
                    <label class="input">
                        {!! Form::text('profit_margin', null, ['data-type'=>'float', 'data-realvalue' => $product->profit_margin]) !!}
                    </label>
                </section>
                <section class="col col-md-3 col-sm-12 col-xs-12">
                    <label class="label">Precio:</label>
                    <label class="input">
                        {!! Form::text('price', null, ['data-type'=>'float']) !!}
                    </label>
                </section>
            </div>
            <div class="row">
                <section class="col col-md-4 col-sm-12 col-xs-12">
                    <label class="label">Categoría:</label>
                    <label class="select">
                        {!! Form::select('category_id', $categories) !!}
                        <i></i>
                    </label>
                </section>
                <section class="col col-md-4 col-sm-12 col-xs-12">
                    <label class="label">Subcategoría:</label>
                    <label class="select">
                        {!! Form::select('subcategory_id', $subcategories) !!}
                        <i></i>
                    </label>
                </section>
                <section class="col col-md-4 col-sm-12 col-xs-12">
                    <label class="label">Estado:</label>
                    <label class="select">
                        {!! Form::select('is_visible', ['1'=>'Visible', '0'=>'Oculto']) !!}
                        <i></i>
                    </label>
                </section>
            </div>
        </fieldset>
        <fieldset>
            <legend>Descripción</legend>
            <div class="row">
                <section class="col col-md-12 col-sm-12 col-xs-12">
                    <label class="label">Descripción del producto:</label>
                    <label class="textarea">
                        {!! Form::textarea('description', null) !!}
                    </label>
                </section>
            </div>
        </fieldset>
    {!! Form::close() !!}

    @include('admin.partials._widget-footer')
@endsection

@section('extra-content')
    @include('admin.components.images-uploader', ['model' => $product, 'resource' => 'products'])
@endsection

@section('scripts')
    <script src="/js/admin/plugin/jquery-form/jquery-form.min.js"></script>
    <script src="/js/admin/product.js?1"></script>
@endsection
