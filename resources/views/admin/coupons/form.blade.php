@extends('admin.blank')

@section('head')
    <style>
        .select2-container-multi .select2-choices .select2-search-choice, .select2-selection__choice {
            padding: 1px 28px 1px 8px;
            margin: 4px 0 3px 5px;
        }
        .select2-selection__choice__remove {padding: 3px 4px 3px 6px !important}
    </style>
@endsection

@section('content')
    <!-- RIBBON -->
    <div id="ribbon">
        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li>Home</li>
            <li><a href="/admin/coupons">Cupones</a></li>
            <li>{{ $viewConfig['accion'] }}</li>
        </ol>
        <!-- end breadcrumb -->
    </div>
    <!-- END RIBBON -->

    <!-- MAIN CONTENT -->
    <div id="content">

        <!-- row -->
        <div class="row">

            <!-- col -->
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">

                    <!-- PAGE HEADER -->
                    <i class="fa-fw fa fa-ticket"></i> Cupones
                    <sapn>&gt; {{ $viewConfig['accion'] }}</span>
                </h1>
            </div>
            <!-- end col -->

        </div>
        <!-- end row -->

        <!-- FORM -->
        {!! Form::model($coupon, $formOptions) !!}
            <fieldset>
                <div class="row">
                    <section class="col col-md-6 col-sm-12 col-xs-12">
                        <label class="label">Valor:</label>
                        <label class="input">
                            {!! Form::text('discount', null, ['autofocus']) !!}
                        </label>
                    </section>
                    <section class="col col-md-6 col-sm-12 col-xs-12">
                        <label class="label">Tipo:</label>
                        <label class="input">
                            {!! Form::select('type_id', [1=>'Porcentaje', 2=>'Pesos'], null, ['class' => 'form-control']) !!}
                        </label>
                    </section>
                </div>
                <div class="row">
                    <section class="col col-md-6 col-sm-6 col-xs-12">
                        <label class="label">Clientes:</label>
                        <label class="input">
                        {!! Form::select('clients[]', \App\Client::orderBy('name')->pluck('email', 'id')->toArray(), null, ['class' => 'form-input select2', 'multiple']) !!}
                        </label>
                    </section>
                    <div class="row">
                    <section class="col col-md-6 col-sm-12 col-xs-12">
                        <label class="label">Texto de la fecha:</label>
                        <label class="input">
                            {!! Form::text('date', null, ['placeholder' => 'Ej.: 2 al 7 de julio']) !!}
                        </label>
                    </section>
                </div>
            </fieldset>
        {!! Form::close() !!}
        <!-- FORM -->

        <div class="widget-footer smart-form">
            <div class="btn-group">
                <a href="javascript: window.history.back();" class="btn btn-sm btn-default" style="margin-right: 10px">
                    Cancelar
                </a>
                <button class="btn btn-sm btn-success saveForm" type="submit">
                    Guardar
                </button>
            </div>
        </div>

    </div>
    <!-- END MAIN CONTENT -->
@endsection

@section('scripts')
    <script src="/js/admin/plugin/jquery-form/jquery-form.min.js"></script>
    <script src="/js/admin/plugin/jquery-tagsinput/jquery.tagsinput.min.js"></script>
    <script src="/js/admin/coupon.js"></script>
@endsection
