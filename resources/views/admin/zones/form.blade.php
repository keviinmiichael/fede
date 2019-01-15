@extends('admin.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li>Home</li>
        <li><a href="/admin/zones">Zonas</a></li>
        <li>{{ $viewConfig['accion'] }}</li>
    </ol>
@endsection

@section('title')
    <i class="fa-fw fa fa-list"></i> Zonas
    <sapn>&gt; {{ $viewConfig['accion'] }}</span>
@endsection

@section('widget-title')
    <h2>{{ $viewConfig['accion'] }}</h2>
@endsection

@section('widget-body')
    {!! Form::model($zone, $formOptions) !!}
        <fieldset>
            <legend>Datos</legend>
            <div class="row">
                <section class="col col-md-12 col-sm-12 col-xs-12">
                    <label class="label">Nombre:</label>
                    <label class="input">
                        {!! Form::text('name', null, ['autofocus']) !!}
                    </label>
                </section>
        </fieldset>
    {!! Form::close() !!}

    @include('admin.partials._widget-footer')
@endsection

@section('scripts')
    <script src="/js/admin/plugin/jquery-form/jquery-form.min.js"></script>
    <script src="/js/admin/zone.js"></script>
@endsection
