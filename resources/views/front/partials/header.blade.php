<header class="navbar navbar-sticky">
  <!-- Search-->
  <form class="site-search" method="get" action="/busqueda">
    <input type="text" name="q" placeholder="Buscar...">
    <div class="search-tools"><span class="clear-search">Borrar</span><span class="close-search"><i class="icon-cross"></i></span></div>
  </form>
  <div class="site-branding">
    <div class="inner">
      <!-- Off-Canvas Toggle (#shop-categories)--><a class="offcanvas-toggle cats-toggle" href="#shop-categories" data-toggle="offcanvas"></a>
      <!-- Off-Canvas Toggle (#mobile-menu)--><a class="offcanvas-toggle menu-toggle" href="#mobile-menu" data-toggle="offcanvas"></a>
      <!-- Site Logo--><a class="site-logo" href="/"><img src="/img/front/logo.png" alt="Unishop"></a>
    </div>
  </div>
  <!-- Main Navigation-->
  <nav class="site-menu">
    <ul>
      <li class="has-megamenu active"><a href="/"><span>Home</span></a></li>
      <li><a href="/productos"><span>Shop</span></a></li>
      <li><a href="/aboutus"><span>Quienes somos</span></a></li>
      <li><a href="/contacto"><span>Contacto</span></a></li>
      <li><a href="/faq"><span>FAQ</span></a></li>
    </ul>
  </nav>
  <!-- Toolbar-->
  <div class="toolbar">
    <div class="inner">
      <div class="tools">
        <div class="search"><i class="icon-search"></i></div>
        <div class="account"><a href="account-orders.html"></a><i class="icon-head"></i>
          <ul class="toolbar-dropdown">
            @if (\Auth::guard('clients')->check())
                <li class="sub-menu-user">
                  <div class="user-info">
                    <h6 class="user-name">{{\Auth::guard('clients')->user()->name}}</h6>
                  </div>
                </li>
                <li class="sub-menu-separator"></li>
                <li><a href="/perfil/logout"> <i class="icon-unlock"></i>Logout</a></li>
            @else
                <li class="sub-menu-user">
                      <li><a href="/perfil/login"> <i class="icon-unlock"></i>Login</a></li>
                </li>
            @endif
          </ul>
        </div>
        <div class="cart">
          <a href="/carrito"></a><i class="carritoo icon-bag"></i>
          <span id="cart-total-items" class="count cart-count">{{\Cart::count()}}</span>
          <span id="cart-total-price" class="subtotal cart-total">{{\Cart::subtotal()}}</span>
        </div>
      </div>
    </div>
  </div>
</header>
