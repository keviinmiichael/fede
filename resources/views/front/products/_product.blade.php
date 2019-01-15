<div class="grid-item">
  <div class="product-card">
      @if ($product->discount)
          <div class="product-badge text-danger">{{$product->discount}}% Off</div>
      @endif
    <a class="product-thumb" href="{{$product->getPath()}}"><img src="/content/products/450X290/{{$product->getThumbAttribute()}}" alt="Product"></a>
    <h3 class="product-title"><a href="{{$product->getPath()}}">{{$product->name}}</a></h3>
    <h4 class="product-price">
        @if ($product->calculatePrice() != $product->getDiscountPriceAttribute())
            <del>${{$product->calculatePrice()}}</del>${{$product->getDiscountPriceAttribute()}}
        @else
            ${{$product->calculatePrice()}}
        @endif
    </h4>
    <div class="product-buttons">
      <button data-id="{{$product->id}}" class="btn btn-outline-primary btn-sm addToCart" data-toast data-toast-type="success" data-toast-position="bottomRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="El producto fue agregado al carrito.">
          Agregar al carrito
          <span class="fa fa-spin fa-spinner" style="display: none"></span>
      </button>
    </div>
  </div>
</div>

{{-- @section('scripts')
    <script>
    $(document).ready(function(){
        $('.addToCart').click(function(e) {
            e.preventDefault();
            var $this = $(this);

            var id = $this.data('id');

            $this.find('fa').show();
            $.ajax({
                url: '/cart/add/'+id,
                type: 'post',
                data: {qty: $('#qty').val()},
                success: function (response) {
                    $this.find('fa').hide();
                    $('#cart-total-items').text(response.totalItems);
                    $('#cart-total-price').text(response.total);
                    $('.carritoo').shake({distance: 10, speed: 90, times: 2});
                    // $.notify({message: 'El producto se agregó con éxito' },{type: 'success'});
                }
            });
        });
    });
    </script>
@endsection --}}
