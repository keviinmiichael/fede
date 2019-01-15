@extends('front.app')

@section('content')
    @include('front.partials.home.slider')

      <!-- Featured Products Carousel-->
      <section class="container padding-top-3x padding-bottom-3x">
        <h3 class="text-center mb-30">Featured Products</h3>
        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
          <!-- Product-->
          @foreach ($products as $product)
                <div class="grid-item">
                  <div class="product-card">
                      @if ($product->discount)
                          <div class="product-badge text-danger">{{$product->discount}}% Off</div>
                      @endif
                    <a class="product-thumb" href="{{$product->getPath()}}"><img src="/content/products/250x320/{{$product->getThumbAttribute()}}" alt="Product"></a>
                    <h3 class="product-title"><a href="{{$product->getPath()}}">{{$product->name}}</a></h3>
                    <h4 class="product-price">
                        @if ($product->calculatePrice() != $product->getDiscountPriceAttribute())
                            <del>${{$product->calculatePrice()}}</del>${{$product->getDiscountPriceAttribute()}}
                        @else
                            ${{$product->calculatePrice()}}
                        @endif
                    </h4>
                    <div class="product-buttons">
                      <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
                      <button data-id="{{$product->id}}" class="btn btn-outline-primary btn-sm addToCart" data-toast data-toast-type="success" data-toast-position="bottomRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="El producto fue agregado al carrito.">
                          Agregar al carrito
                          <span class="fa fa-spin fa-spinner" style="display: none"></span>
                      </button>
                    </div>
                  </div>
                </div>
            @endforeach
        </div>
      </section>

      <!-- Popular Brands-->
      <section class="bg-faded padding-top-3x padding-bottom-3x">
        <div class="container">
          <h3 class="text-center mb-30 pb-2">Popular Brands</h3>
          <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: false, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:2}, &quot;470&quot;:{&quot;items&quot;:3},&quot;630&quot;:{&quot;items&quot;:4},&quot;991&quot;:{&quot;items&quot;:5},&quot;1200&quot;:{&quot;items&quot;:6}} }"><img class="d-block w-110 opacity-75 m-auto" src="/img/template/brands/01.png" alt="Adidas"><img class="d-block w-110 opacity-75 m-auto" src="/img/template/brands/02.png" alt="Brooks"><img class="d-block w-110 opacity-75 m-auto" src="/img/template/brands/03.png" alt="Valentino"><img class="d-block w-110 opacity-75 m-auto" src="/img/template/brands/04.png" alt="Nike"><img class="d-block w-110 opacity-75 m-auto" src="/img/template/brands/05.png" alt="Puma"><img class="d-block w-110 opacity-75 m-auto" src="/img/template/brands/06.png" alt="New Balance"><img class="d-block w-110 opacity-75 m-auto" src="/img/template/brands/07.png" alt="Dior"></div>
        </div>
      </section>
      <!-- Services-->
      <section class="container padding-top-3x padding-bottom-2x">
        <div class="row">
          <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="/img/template/services/01.png" alt="Shipping">
            <h6>Free Worldwide Shipping</h6>
            <p class="text-muted margin-bottom-none">Free shipping for all orders over $100</p>
          </div>
          <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="/img/template/services/02.png" alt="Money Back">
            <h6>Money Back Guarantee</h6>
            <p class="text-muted margin-bottom-none">We return money within 30 days</p>
          </div>
          <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="/img/template/services/03.png" alt="Support">
            <h6>24/7 Customer Support</h6>
            <p class="text-muted margin-bottom-none">Friendly 24/7 customer support</p>
          </div>
          <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="/img/template/services/04.png" alt="Payment">
            <h6>Secure Online Payment</h6>
            <p class="text-muted margin-bottom-none">We posess SSL / Secure Certificate</p>
          </div>
        </div>
      </section>
@endsection
