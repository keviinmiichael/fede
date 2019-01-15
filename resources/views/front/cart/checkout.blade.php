@extends('front.app')

@section('title', 'Carrito')

@section('content')
<!-- Page Title-->
  <div class="page-title">
    <div class="container">
      <div class="column">
        <h1>Carrito</h1>
      </div>
      <div class="column">
        <ul class="breadcrumbs">
          <li><a href="/">Home</a>
          </li>
          <li class="separator">&nbsp;</li>
          <li>Carrito</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Page Content-->
  <div class="container padding-bottom-3x mb-2">
    <div class="row">
      <!-- Checkout Adress-->
      <div class="col-xl-12 col-lg-12">
        <div class="checkout-steps">
            <a style="width: 33%" class="active" href="/carrito/checkout">3. Confirmación</a>
            <a style="width: 33%" href="/carrito/medio-de-pago"><span class="angle"></span>2. Medio de pago</a>
            <a style="width: 33%" href="/carrito/envio"><span class="angle"></span>1. Envío</a>
        </div>
        <h4>Datos</h4>
        <hr class="padding-bottom-1x">
        <div class="table-responsive shopping-cart">
          <table class="table">
            <thead>
              <tr>
                <th>Producto</th>
                <th class="text-center">Subtotal</th>
              </tr>
            </thead>
            <tbody>
              @foreach($cartItems as $item)
              <tr>
                <td>
                  <div class="product-item">
                    <a class="product-thumb" href="{{$item->options->path}}" title="{{$item->name}}">
                      <img src="/content/products/thumb/{{$item->options->picture_url}}" alt="{{$item->name}}">
                    </a>
                    <div class="product-info">
                      <h4 class="product-title"><a href="{{$item->options->path}}" title="{{$item->name}}">{{ $item->name }}</a></h4>
                    </div>
                  </div>
                </td>
                <td class="text-center text-lg text-medium">${{ $item->price }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="shopping-cart-footer">
          <div class="column"></div>
          <div class="column text-lg">Total: <span class="text-medium">${{Cart::subtotal()}}</span></div>
        </div>
        <div class="row padding-top-1x mt-3">
          @if (session()->get('shipping.shipping'))
            <div class="col-sm-6">
              <h5>Envío:</h5>
              <ul class="list-unstyled">
                <li><span class="text-muted">Client:</span>{{ \Auth::guard('clients')->user()->name }}</li>
                <li><span class="text-muted">Address:</span>{{ session()->get('shipping.address') }} - {{ session()->get('shipping.zone_value') }}</li>
              </ul>
            </div>
          @endif
          <div class="col-sm-6" style="text-align: right;">
            <h5>Método de pago:</h5>
            <ul class="list-unstyled">
              <li><span class="text-muted">{{ session()->get('payment_method.label') }}</span></li>
            </ul>
          </div>
        </div>
        <div class="checkout-footer">
          <div class="column"><a class="btn btn-outline-secondary" href="/carrito/medio-de-pago"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Volver al Carrito</span></a></div>
          <div class="column"><a class="btn btn-primary" href="pagar"><span class="hidden-xs-down">Pagar</span><i class="icon-arrow-right"></i></a></div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="/js/checkout.js"></script>
@endsection