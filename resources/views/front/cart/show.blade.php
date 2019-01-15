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
  <div class="container padding-bottom-3x mb-1">
    @if (count($cartItems))
      <!-- Shopping Cart-->
      <div class="table-responsive shopping-cart">
        <table class="table table-products">
          <thead>
            <tr>
              <th>Producto</th>
              <th class="text-center">Precio unitario</th>
              <th class="text-center">Cantidad</th>
              <th class="text-center">Total</th>
              <th class="text-center">
                <a class="btn btn-sm btn-outline-danger" href="#">Vaciar carrito</a>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($cartItems as $item)
              <tr class="table-row">
                <td>
                  <div class="product-item">
                    <a class="product-thumb" href="{{$item->options->path}}" title="{{$item->name}}">
                      <img src="/content/products/thumb/{{$item->options->picture_url}}" alt="{{$item->name}}">
                    </a>
                    <div class="product-info">
                      <h4 class="product-title">
                        <a href="{{$item->options->path}}" title="{{$item->name}}">{{ $item->name }}</a>
                      </h4>
                    </div>
                  </div>
                </td>
                
                <td class="text-center text-lg text-medium price">${{ $item->price }}</td>
                <td class="text-center">
                  <div class="count-input">
                    <select class="form-control amount" data-rowId="{{$item->rowId}}">
                      @for ($i = 1; $i < 10; $i++)
                        @php $selected = ($i == $item->qty) ? 'selected' : ''; @endphp
                        <option {{$selected}} value="{{$i}}">{{$i}}</option>
                      @endfor
                    </select>
                  </div>
                </td>
                <td class="text-center text-lg text-medium subtotal">${{ $item->subtotal }}</td>
                <td class="text-center">
                  <a class="remove" href="remover" data-toggle="tooltip" data-rowId="{{$item->rowId}}"><i class="icon-cross"></i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="shopping-cart-footer">
        <div class="column text-lg">Total: <span class="text-medium cart-total">${{ Cart::subtotal() }}</span></div>
      </div>
      <div class="shopping-cart-footer">
        <div class="column"><a class="btn btn-outline-secondary" href="/productos"><i class="icon-arrow-left"></i>&nbsp;Seguir comprando</a></div>
        <div class="column"><a class="btn btn-success" href="/checkout/envio">comprar</a></div>
      </div>
    @else
        <p style="font-size: 18px; font-weight: bold; text-align: center">No hay productos en el carrito.</p>
    @endif
  </div>
@endsection

@section('scripts')
<script>
    var Cart = (function (w, $, undefined) {

        function init () {
            listeners();
            removerProducto();
        }

        function listeners () {
            $('.amount').on('change', function () {
                actualizarTotal();
            });
        }

        function removerProducto () {
            $('.table-products').on('click', '.remove',function (e) {
                e.preventDefault();
                var $this = $(this);
                $.ajax({
                    url: '/cart/remove',
                    type: 'post',
                    data: {rowId: $this.data('rowid')},
                    success: function (response) {
                        $('.cart-count').text(response.totalItems);
                        $this.parents('.table-row').remove();
                        if (!$('.table-products .table-row').length) {
                            $('.table-products').append('<tr><td colsapn="5" style="font-size: 18px; font-weight: bold; text-align: center">No hay productos en el carrito</td></tr>')
                        }
                        actualizarTotal();
                    }
                });
            });
        }


        function actualizarTotal () {
            if ($('table tbody tr .price').length) {
                var precio, cantidad, subtotal, total = 0;
                $('table tbody tr').each(function () {
                    precio = $(this).find('.price').text().replace(/[^0-9]+/g, '');
                    cantidad = $(this).find('.amount').val();
                    total += parseInt(precio * cantidad);
                    subtotal = parseInt(precio * cantidad).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    $(this).find('.subtotal').text('$ ' + subtotal);
                });
                total = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                $('.cart-total').text('$ ' + total);
            } else {
                $('.cart-total').text('0');
            }
        }

        return {
            init : function () {
                init();
            }
        }

    })(window, jQuery, undefined);

    $(document).ready(function () {
        Cart.init();
    });
</script>
@endsection
