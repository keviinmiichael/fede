@extends('admin.blank')

@section('content')
    <div id="ribbon">
        <ol class="breadcrumb">
            <li>Home</li>
            <li>Compras</li>
            <li>{{ $purchase->client?$purchase->client->name:$purchase->client_fullname }}</li>
        </ol>
    </div>

    <!-- MAIN CONTENT -->
    <div id="content">

        <!-- row -->
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <h1 class="page-title txt-color-blueDark">

                    <!-- PAGE HEADER -->
                    <i class="fa-fw fa fa-shopping-cart"></i>
                        Compras
                    <span>>
                        {{ $purchase->client?$purchase->client->name:$purchase->client_fullname }}
                    </span>
                </h1>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 text-right">
                <h3 class="page-title txt-color-blueDark">Subtotal: ${{ $purchase->total }}</h3>
                <h3 class="page-title txt-color-blueDark">Envío: {{ $purchase->shipping?'$'.$purchase->shipping:'Retira en local' }}</h3>
                <h3 class="page-title txt-color-blueDark">Costo: ${{ $purchase->cost}}</h3>
                @if ($purchase->total != $purchase->cost)
                    <h3 class="page-title txt-color-blueDark">La compra tuvo un descuento de: ${{ $purchase->cost - $purchase->total }}</h3>
                @endif
                <h3 class="page-title txt-color-blueDark">Total: ${{ $purchase->total + $purchase->shipping }}</h3>
            </div>
        </div>
        <!-- end row -->

        <!-- widget grid -->
        <section id="widget-grid" class="">
            <div class="row">
                <div class="col-sm-6 col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-body status">
                            <div class="who clearfix">
                                <h4>Datos del comprador</h4>

                            </div>
                            <div class="who clearfix">
                                @if ($purchase->client)
                                    <p><strong>Nombre:</strong> {{ $purchase->client->name . ' ' . $purchase->client->lastname }}</p>
                                    <p><strong>Email:</strong> {{ $purchase->client->email }}</p>
                                    <p><strong>Teléfono:</strong> {{ $purchase->client->phone }}</p>
                                @else
                                    <p><strong>Nombre:</strong> {{ $purchase->client_fullname}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- row -->
            <div class="row">
                <article class="col-sm-12">
                    <div
                        class="jarviswidget jarviswidget-color-darken"
                        id=""
                        data-widget-colorbutton="false"
                        data-widget-editbutton="false"
                        data-widget-togglebutton="false"
                        data-widget-deletebutton="false"
                        data-widget-sortable="false"
                    >
                        <header>
                            <h2>Resumen de la compra</h2>
                        </header>

                        <!-- widget div-->
                        <div role="content">

                            <!-- widget content -->
                            <div class="widget-body no-padding">
                                <table id="datatable" class="table table-striped table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($purchase->items as $item)
                                            <tr>
                                                <td>{{$item->product->name}}</td>
                                                <td>{{$item->price}}</td>
                                                <td>{{$item->amount}}</td>
                                                <td>{{$item->price * $item->amount}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <input id="purchase_id" type="hidden" name="purchase_id" value="{{$purchase->id}}">
                            </div>
                            <!-- /widget content -->
                        </div>
                        <!-- /widget div -->
                    </div>
                    <!-- end widget -->
                </article>
                <!-- WIDGET END -->
            </div>
            <!-- end row -->
        </section>
        <!-- end widget grid -->
    </div>
    <!-- END MAIN CONTENT -->
@endsection

@section('scripts')
    <script src="/js/admin/items.js"></script>
@endsection
