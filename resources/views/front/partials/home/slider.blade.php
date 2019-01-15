  <div class="gallery-wrapper owl-carousel"  data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true, &quot;autoplay&quot;: true, }" id="slider-home">
    @foreach ($slider->images as $image)
      <div class="gallery-item no-hover-effect">
        <img src="content/sliders/big/{{$image->src}}" alt="{{$image->title ?? env('APP_NAME')}}">
        @if ($image->title)
          <span class="caption"{{$image->title}}</span>
        @endif
      </div>
    @endforeach
</div>
