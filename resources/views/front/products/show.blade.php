@extends('front.app')

@section('title', $product->name)

@section('content')
  <!-- Page Title-->
  <div class="page-title">
    <div class="container">
      <div class="column">
        <h1>{{$product->name}}</h1>
      </div>
      <div class="column">
        <ul class="breadcrumbs">
          <li><a href="/">Home</a>
          </li>
          <li class="separator">&nbsp;</li>
          <li><a href="/productos">Shop</a>
          </li>
          <li class="separator">&nbsp;</li>
          <li>{{$product->name}}</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Page Content-->
  <div class="container padding-bottom-3x mb-1">
    <div class="row">
      <!-- Poduct Gallery-->
      <div class="col-md-6">
        <div class="product-gallery">
          @if ($product->discount)
              <span class="product-badge text-danger">{{$product->discount}}% Off</span>
          @endif

          @if ($product->images->count())
            <div class="gallery-wrapper">
              {{--
              @foreach ($product->images as $image)
                <div class="gallery-item {{$loop->first ? 'active': ''}}">
                  <a href="/content/products/big/{{$image->src}}" data-hash="img{{$image->id}}" data-size="1000x667"></a>
                </div>
              @endforeach
              --}}
            </div>
            <div class="product-carousel owl-carousel">
              @foreach ($product->images as $image)
                <div data-hash="img{{$image->id}}"><img src="/content/products/1000x667/{{$image->src}}" alt="{{$product->name}}"></div>
              @endforeach
            </div>
            <ul class="product-thumbnails">
              @foreach ($product->images as $image)
                <li class="{{$loop->first ? 'active': ''}}">
                  <a href="#img{{$image->id}}"><img src="/content/products/188x134/{{$image->src}}" alt="{{$product->name}}"></a>
                </li>
              @endforeach
            </ul>
          @else
            <img src="/content/products/1000x667/{{$product->thumb}}" alt="{{$product->name}}">
          @endif
          
        </div>
      </div>
      <!-- Product Info-->
      <div class="col-md-6">
        <div class="padding-top-2x mt-2 hidden-md-up"></div>
        <h2 class="padding-top-1x text-normal">{{$product->name}}</h2>
        <span class="h2 d-block">
          @if ($product->calculatePrice() != $product->getDiscountPriceAttribute())
              <del class="text-muted text-normal">${{$product->calculatePrice()}}</del>&nbsp; ${{$product->getDiscountPriceAttribute()}}
          @else
              &nbsp; ${{$product->calculatePrice()}}
          @endif
        </span>
        <p>{{$product->description}}</p>
        <div class="row margin-top-1x">
          <div class="col-sm-3">
            <div class="form-group">
              <label for="quantity">Cantidad</label>
              <select class="form-control" name="qty" id="qty" style="width: 70px;margin-left:10px;">
                @for ($i=1; $i <=$product->stock; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
              </select>
            </div>
          </div>
        </div>
        <hr class="mb-3">
        <div class="d-flex flex-wrap justify-content-between">
          <div class="sp-buttons mt-2 mb-2">
              <button data-id="{{$product->id}}" class="btn btn-outline-primary btn-sm addToCart" data-toast data-toast-type="success" data-toast-position="bottomRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="El producto fue agregado al carrito.">
                  Agregar al carrito
                  <span class="fa fa-spin fa-spinner" style="display: none"></span>
              </button>
          </div>
        </div>
      </div>
    </div>
    <!-- Product Tabs-->

    @includeWhen($product->relatedProducts()->count(), 'front.products._related')

  </div>
@endsection

{{-- @section('scripts')
    <script>
    $(document).ready(function(){
        $('.addToCart').click(function(e) {
            e.preventDefault();
            var $this = $(this);

            $this.find('fa').show();
            $.ajax({
                url: '/cart/add/' + $this.data('id'),
                type: 'post',
                data: {qty: $('#qty').val()},
                success: function (response) {
                    $this.find('fa').hide();
                    $('#cart-total-items').text(response.totalItems);
                    $('.carritoo').shake({distance: 10, speed: 90, times: 2});
                    $.notify({message: 'El producto se agregó con éxito' },{type: 'success'});
                }
            });
        });
    });
    </script>
@endsection --}}
