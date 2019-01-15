<!-- Related Products Carousel-->
<h3 class="text-center padding-top-2x mt-2 padding-bottom-1x">Productos relacionados</h3>
<!-- Carousel-->
<div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
  <!-- Product-->
  @foreach ($product->relatedProducts() as $productR)
      <div class="grid-item">
        <div class="product-card">
            @if ($productR->discount)
                <div class="product-badge text-danger">{{$productR->discount}}% Off</div>
            @endif
          <a class="product-thumb" href="{{$productR->getPath()}}"><img src="/content/products/450X290/{{$product->getThumbAttribute()}}" alt="Product"></a>
          <h3 class="product-title"><a href="{{$productR->getPath()}}">{{$productR->name}}</a></h3>
          <h4 class="product-price">
              @if ($productR->calculatePrice() != $productR->getDiscountPriceAttribute())
                  <del>${{$productR->calculatePrice()}}</del>${{$productR->getDiscountPriceAttribute()}}
              @else
                  ${{$productR->calculatePrice()}}
              @endif
          </h4>
          <div class="product-buttons">
            <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
            <button data-id="{{$productR->id}}" class="btn btn-outline-primary btn-sm addToCart" data-toast data-toast-type="success" data-toast-position="bottomRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="El producto fue agregado al carrito.">
                Agregar al carrito
                <span class="fa fa-spin fa-spinner" style="display: none"></span>
            </button>
          </div>
        </div>
      </div>
  @endforeach
</div>
