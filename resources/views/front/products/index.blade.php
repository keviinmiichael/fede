@extends('front.app')

@section('content')
  <!-- Page Title-->
  <div class="page-title">
    <div class="container">
      <div class="column">
        <h1>Nuestros Productos</h1>
      </div>
      <div class="column">
        <ul class="breadcrumbs">
          <li><a href="/">Home</a>
          </li>
          <li class="separator">&nbsp;</li>
          <li>Shop</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Page Content-->
  <div class="container padding-bottom-3x mb-1">
    <div class="row">
      <!-- Products-->
      <div class="col-xl-9 col-lg-8 order-lg-2">
        <!-- Shop Toolbar-->
        {{-- <div class="shop-toolbar padding-bottom-1x mb-2">
          <div class="column">
            <div class="shop-sorting">
              <label for="sorting">Sort by:</label>
              <select class="form-control" id="sorting">
                <option>Popularity</option>
                <option>Low - High Price</option>
                <option>High - Low Price</option>
                <option>Avarage Rating</option>
                <option>A - Z Order</option>
                <option>Z - A Order</option>
              </select><span class="text-muted">Showing:&nbsp;</span><span>1 - 12 items</span>
            </div>
          </div>
        </div> --}}
        <!-- Products Grid-->
        <div class="isotope-grid cols-3 mb-2">
          <div class="gutter-sizer"></div>
          <div class="grid-sizer"></div>
          <!-- Product-->
          @foreach ($products as $product)
              @include('front.products._product')
          @endforeach
          <!-- Product-->
        </div>
        <!-- Pagination-->
        <nav class="pagination">
          <div class="column">
              {{$products->appends(request()->input())->links()}}
          </div>
        </nav>
      </div>
      <!-- Sidebar          -->
      <div class="col-xl-3 col-lg-4 order-lg-1">
        <button class="sidebar-toggle position-left" data-toggle="modal" data-target="#modalShopFilters"><i class="icon-layout"></i></button>
        <aside class="sidebar sidebar-offcanvas">
          <!-- Widget Categories-->
          <section class="widget widget-categories">
            <h3 class="widget-title">Shop Categories</h3>
            <ul>
              @foreach ($categories as $category)
                  <li class="has-children expanded"><a href="/{{$category->slug}}">{{$category->value}}</a>
                      @continue(!$category->subcategories)
                    <ul>
                        @foreach ($category->subcategories as $subcategory)
                            <li><a href="{{$subcategory->getPath()}}">{{$subcategory->value}}</a></li>
                        @endforeach
                    </ul>
                  </li>
              @endforeach
            </ul>
          </section>
        </aside>
      </div>
    </div>
  </div>
@endsection
