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
                <a style="width: 33%">3. Confirmación</a>
                <a style="width: 33%" class="active"><span class="angle"></span>2. Medio de pago</a>
                <a style="width: 33%" href="/carrito/envio"><span class="angle"></span>1. Envío</a>
            </div>
            <h4>Datos</h4>
            <hr class="padding-bottom-1x">
            <form class="table-responsive" id="form">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td class="align-middle">
                      <div class="custom-control custom-radio mb-0">
                        @php $checked = session()->get('payment_method.id') == '0' ? 'checked' : ''; @endphp
                        <input class="custom-control-input" type="radio" id="mp" name="payment_method" value="0" {{$checked}}>
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
                        @php $checked = session()->get('payment_method.id') == '1' ? 'checked' : ''; @endphp
                        <input class="custom-control-input" type="radio" id="transferencia" name="payment_method" value="1" {{$checked}}>
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
            </form>
            <div class="checkout-footer">
              <div class="column"><a class="btn btn-outline-secondary" href="/carrito/envio"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Volver</span></a></div>
              <div class="column"><a class="btn btn-primary" href="/carrito/checkout" id="next"><span class="hidden-xs-down">Continuar</span><i class="icon-arrow-right"></i></a></div>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('scripts')
<script>
    (function () {
      $('#no-shipping').on('change', function() {
        if ($(this).is(':checked')) {
          $('#subzone_id, #address').attr('disabled', true).val('');
        } else {
          $('#subzone_id, #address').attr('disabled', false);
        }
      });
      $("#next").on('click', function(e) {
        e.preventDefault();
        $('span', this).text('CONTINUAR...');
        $.ajax({
          url: '/cart/step2',
          type: 'post',
          data: $('#form').serialize(),
          success: function () {
            window.location = $(this).attr('href')
          }.bind(this)
        })
      });
    })();
</script>
@endsection
