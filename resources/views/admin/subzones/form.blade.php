@extends('admin.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li>Home</li>
        @if ($zone->id)
            <li><a href="/admin/zones/{{$zone->id}}/subzones">{{$zone->name}}</a></li>
        @endif
        <li><a href="/admin/">Subzonas</a></li>
        <li>{{ $viewConfig['accion'] }}</li>
    </ol>
@endsection

@section('title')
    <i class="fa-fw fa fa-list"></i> Subzonas
    <sapn>&gt; {{ $viewConfig['accion'] }}</span>
@endsection

@section('widget-title')
    <h2>{{ $viewConfig['accion'] }}</h2>
@endsection

@section('widget-body')
    {!! Form::model($subzone, $formOptions) !!}
        <fieldset>
            <legend>Datos</legend>
            <div class="row">
                <section class="col col-md-6 col-sm-12 col-xs-12">
                    <label class="label">Nombre:</label>
                    <label class="input">
                        {!! Form::text('name', null, ['autofocus']) !!}
                    </label>
                </section>
                <section class="col col-md-6 col-sm-12 col-xs-12">
                    <label class="label">Precio:</label>
                    <label class="input">
                        {!! Form::number('price', null, ['autofocus', 'placeholder' => 'Precio en pesos $']) !!}
                    </label>
                </section>
                <input type="hidden" name="zone_id" value="{{$zone->id}}">
        </fieldset>
    {!! Form::close() !!}

    @include('admin.partials._widget-footer')
@endsection

@section('scripts')
    <script src="/js/admin/plugin/jquery-form/jquery-form.min.js"></script>
    <script src="/js/admin/zone.js"></script>
@endsection
