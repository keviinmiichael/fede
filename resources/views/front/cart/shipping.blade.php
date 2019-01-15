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
        <form id="form" class="row">
          <!-- Checkout Adress-->
          <div class="col-xl-12 col-lg-12">
            <div class="checkout-steps">
                <a style="width: 33%">3. Confirmación</a>
                <a style="width: 33%"><span class="angle"></span>2. Medio de pago</a>
                <a style="width: 33%" class="active"><span class="angle"></span>1. Envío</a>
            </div>
            <h4>Datos</h4>
            <hr class="padding-bottom-1x">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="name">Nombre</label>
                  <input class="form-control" type="text" id="name" value="{{ \Auth::guard('clients')->user()->name }}" readonly>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control" type="email" id="email" value="{{ \Auth::guard('clients')->user()->email }}" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="address">Dirección</label>
                  <input class="form-control" type="text" id="address" value="{{session()->get('shipping.address', '')}}" name="address">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="checkout-country">Zona</label>
                  <select class="form-control" name="subzone_id" id="subzone_id">
                      <option value="">Elegir</option>
                      @foreach ($zones as $zone)
                          <optgroup label="{{$zone->name}}">
                              @foreach ($zone->subzones as $subzone)
                                  @php $selected = session()->get('shipping.subzone_id') == $subzone->id ? 'selected' : ''; @endphp
                                  <option {{$selected}} value="{{$subzone->id}}">{{$subzone->name}} - ${{$subzone->price}} </option>
                              @endforeach
                          </optgroup>
                      @endforeach
                  </select>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    @php $checked = session()->get('shipping.shipping') ? '' : 'checked'; @endphp
                    <input class="custom-control-input" type="checkbox" id="no-shipping" name="no_shipping" value="1" {{$checked}}>
                    <label class="custom-control-label" for="no-shipping">Paso a buscar el pedido</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="checkout-footer">
              <div class="column"><a class="btn btn-outline-secondary" href="/carrito"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Volver</span></a></div>
              <div class="column">
                <a class="btn btn-primary" href="/carrito/medio-de-pago" id="next">
                  <span class="hidden-xs-down">Continuar</span>
                  <i class="icon-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        </form>
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
      })

      $("#next").on('click', function(e) {
        e.preventDefault();
        $('span', this).text('CONTINUAR...');
        $.ajax({
          url: '/cart/step1',
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
