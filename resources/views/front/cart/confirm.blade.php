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
                <a style="width: 33%" href="/carrito/checkout">3. Confirmación</a>
                <a style="width: 33%" class="active" href="/carrito/medio-de-pago"><span class="angle"></span>2. Medio de pago</a>
                <a style="width: 33%" href="/carrito/envio"><span class="angle"></span>1. Envío</a>
            </div>
            <h4>Datos</h4>
            <hr class="padding-bottom-1x">
            <div class="table-responsive">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td class="align-middle">
                      <div class="custom-control custom-radio mb-0">
                        <input class="custom-control-input" type="radio" id="mp" name="payment_method" checked>
                        <label class="custom-control-label" for="mp"></label>
                      </div>
                    </td>
                    <td class="align-middle">
                      <span class="text-medium">Mercado Pago</span><br>
                      <span class="text-muted text-sm">Tarjeta, Pago Fácil, Rapipago...</span>
                    </td>
                    <td style="text-align: right;">
                      <img style="width: 80px" src="/img/front/mp.png" alt="Mercado Pago">
                    </td>
                  </tr>
                  <tr>
                    <td class="align-middle">
                      <div class="custom-control custom-radio mb-0">
                        <input class="custom-control-input" type="radio" id="transferencia" name="payment_method">
                        <label class="custom-control-label" for="transferencia"></label>
                      </div>
                    </td>
                    <td class="align-middle">
                      <span class="text-medium">Transferencia</span><br>
                      <span class="text-muted text-sm">Lorem impsum</span>
                    </td>
                    <td style="text-align: right;">
                      <img style="width: 50px" src="/img/front/banco.png" alt="Banco">
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="checkout-footer">
              <div class="column"><a class="btn btn-outline-secondary" href="/checkout/medio-de-pago"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Volver al Carrito</span></a></div>
              <div class="column"><a class="btn btn-primary" href="/checkout/medio-de-pago"><span class="hidden-xs-down">Pagar</span><i class="icon-arrow-right"></i></a></div>
            </div>
          </div>
        </div>
      </div>
@endsection