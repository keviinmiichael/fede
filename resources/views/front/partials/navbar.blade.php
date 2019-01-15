<!-- Off-Canvas Category Menu-->
    <div class="offcanvas-container" id="shop-categories">
      <div class="offcanvas-header">
        <h3 class="offcanvas-title">Categorías</h3>
      </div>
      <nav class="offcanvas-menu">

        <ul class="menu">
          @foreach ($categories as $category)
            <li class="{{$category->subcategories->count() > 0 ? 'has-children' : ''}}">
              <span>
                <a href="{{$category->slug}}">{{ $category->value }}</a>
                @if ($category->subcategories->count())
                  <span class="sub-menu-toggle"></span>
                @endif
              </span>
                @if ($category->subcategories->count())
                  <ul class="offcanvas-submenu">
                    @foreach ($category->subcategories as $subcategory)
                      <li><a href="{{$subcategory->slug}}">{{ $subcategory->value }}</a></li>
                    @endforeach
                  </ul>
                @endif
            </li>
          @endforeach
        </ul>
      </nav>
    </div>

    <!-- Off-Canvas Mobile Menu-->
    <div class="offcanvas-container" id="mobile-menu">
      <nav class="offcanvas-menu">
        <ul class="menu">
          @foreach ($categories as $category)
            <li class="{{$category->subcategories->count() > 0 ? 'has-children' : ''}}">
              <span>
                <a href="{{$category->slug}}">{{ $category->value }}</a>
                @if ($category->subcategories->count())
                  <span class="sub-menu-toggle"></span>
                @endif
              </span>
                @if ($category->subcategories->count())
                  <ul class="offcanvas-submenu">
                    @foreach ($category->subcategories as $subcategory)
                      <li><a href="{{$subcategory->slug}}">{{ $subcategory->value }}</a></li>
                    @endforeach
                  </ul>
                @endif
            </li>
          @endforeach
        </ul>
      </nav>
    </div>
    <!-- Topbar-->

    <div class="topbar" style="height: 0">
      
    </div>
    <!-- Navbar-->
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
