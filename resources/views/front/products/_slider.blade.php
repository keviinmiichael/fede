@if (count($imagesProduct))
    <div id="slider-product" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @for ($i=0, $l=count($imagesProduct); $i<$l; $i++)
                <li data-target="#slider-product" data-slide-to="{{$i}}" class="{{$i == 0 ? 'active' : ''}}"></li>
            @endfor
        </ol>

        <div class="carousel-inner">
            @foreach ($imagesProduct as $image)
                <div class="item {{$loop->first ? 'active' : ''}}">
                    <div class="col-sm-6">
                        <img  src="/content/products/300x320/{{ $image->src }}" alt="{{$product->name}}" />
                    </div>
                </div>
            @endforeach
        </div>

        <a href="#slider-product" class="left control-carousel hidden-xs" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a href="#slider-product" class="right control-carousel hidden-xs" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
@else
    <img src="/content/products/big/{{ $product->thumb }}" alt="{{$product->name}}" />
@endif
