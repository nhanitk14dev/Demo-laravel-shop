<!-- BEGIN TOP BAR -->
<div class="pre-header">
  <div class="container">
    <div class="row">
      <!-- BEGIN TOP BAR LEFT PART -->
      <div class="col-md-6 col-sm-6 additional-shop-info">
        <ul class="list-unstyled list-inline">
          <li><i class="fa fa-phone"></i><span>+84 01648898764</span></li>
          <li><i class="fa fa-envelope"></i><span>nhanitk14dev@gmail.com</span></li>
          <!-- BEGIN LANGS -->
          @include('frontend.layouts.partials.route_translation')
          <!-- END LANGS -->
        </ul>
      </div>
      <!-- END TOP BAR LEFT PART -->
      <!-- BEGIN TOP BAR MENU -->
      <div class="col-md-6 col-sm-6 additional-nav">
        <ul class="list-unstyled list-inline pull-right">
          <li><a href="shop-account.html">{{trans('f_top.account')}}</a></li>
          <li><a href="shop-wishlist.html">My Wishlist</a></li>
          <li><a href="{{route('cart.checkout')}}">{{trans('f_product.checkout')}}</a></li>
          <li><a href="page-login.html">{{trans('f_top.login')}}</a></li>
        </ul>
      </div>
      <!-- END TOP BAR MENU -->
    </div>
  </div>
</div>
<!-- END TOP BAR -->

<!-- BEGIN HEADER -->
<div class="header" id="myHeader">
  <div class="container">
    <a class="site-logo" href="/"><img src="/assets/themes/corporate/img/logos/logo-shop-red.png" alt="Metronic Shop UI"></a>

    <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

    <!-- BEGIN CART -->
    <div class="top-cart-block">
      <div class="top-cart-info">
        <a href="javascript:void(0);" class="top-cart-info-count">{{Cart::count()}} {{trans('f_product.product')}}</a>
        <a href="javascript:void(0);" class="top-cart-info-value">1500.000 vnd</a>
      </div>
      <i class="fa fa-shopping-cart"></i>

      <div class="top-cart-content-wrapper">
        <div class="top-cart-content">
          <ul class="scroller" style="height: 250px;">
            <li>
              <a href="shop-item.html"><img src="/assets/themes/pages/img/cart-img.jpg" alt="Giày" width="37" height="34"></a>
              <span class="cart-content-count">x 1</span>
              <strong><a href="shop-item.html">Giày</a></strong>
              <em>120.000đ</em>
              <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
            </li>
            <li>
              <a href="shop-item.html"><img src="/assets/themes/pages/img/cart-img.jpg" alt="Giày" width="37" height="34"></a>
              <span class="cart-content-count">x 1</span>
              <strong><a href="shop-item.html">Giày</a></strong>
              <em>120.000đ</em>
              <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
            </li>
            <li>
              <a href="shop-item.html"><img src="/assets/themes/pages/img/cart-img.jpg" alt="Giày" width="37" height="34"></a>
              <span class="cart-content-count">x 1</span>
              <strong><a href="shop-item.html">Giày</a></strong>
              <em>120.000đ</em>
              <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
            </li>
            <li>
              <a href="shop-item.html"><img src="/assets/themes/pages/img/cart-img.jpg" alt="Giày" width="37" height="34"></a>
              <span class="cart-content-count">x 1</span>
              <strong><a href="shop-item.html">Giày</a></strong>
              <em>120.000đ</em>
              <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
            </li>
            <li>
              <a href="shop-item.html"><img src="/assets/themes/pages/img/cart-img.jpg" alt="Giày" width="37" height="34"></a>
              <span class="cart-content-count">x 1</span>
              <strong><a href="shop-item.html">Giày</a></strong>
              <em>120.000đ</em>
              <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
            </li>
            <li>
              <a href="shop-item.html"><img src="/assets/themes/pages/img/cart-img.jpg" alt="Giày" width="37" height="34"></a>
              <span class="cart-content-count">x 1</span>
              <strong><a href="shop-item.html">Giày</a></strong>
              <em>120.000đ</em>
              <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
            </li>
            <li>
              <a href="shop-item.html"><img src="/assets/themes/pages/img/cart-img.jpg" alt="Giày" width="37" height="34"></a>
              <span class="cart-content-count">x 1</span>
              <strong><a href="shop-item.html">Giày</a></strong>
              <em>120.000đ</em>
              <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
            </li>
            <li>
              <a href="shop-item.html"><img src="/assets/themes/pages/img/cart-img.jpg" alt="Giày" width="37" height="34"></a>
              <span class="cart-content-count">x 1</span>
              <strong><a href="shop-item.html">Giày</a></strong>
              <em>120.000đ</em>
              <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
            </li>
          </ul>
          <div class="text-right">
            <a href="{{route('cart.view')}}" class="btn btn-success">Giỏ hàng</a>
            <a href="{{route('cart.checkout')}}" class="btn btn-primary">Đặt hàng</a>
          </div>
        </div>
      </div>
    </div>
    <!--END CART -->

    <!-- BEGIN NAVIGATION -->
    <div class="header-navigation">
      <ul>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
            {{ trans('f_menu.clothe_woman') }}

          </a>

          <!-- BEGIN DROPDOWN MENU -->
          <ul class="dropdown-menu">
            <li class="dropdown-submenu">
              <a href="{{route('product')}}">Hi Tops <i class="fa fa-angle-right"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{route('product')}}">Second Level Link</a></li>
                <li><a href="{{route('product')}}">Second Level Link</a></li>
                <li class="dropdown-submenu">
                  <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                    Second Level Link
                    <i class="fa fa-angle-right"></i>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="{{route('product')}}">Third Level Link</a></li>
                    <li><a href="{{route('product')}}">Third Level Link</a></li>
                    <li><a href="{{route('product')}}">Third Level Link</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="{{route('product')}}">Running Shoes</a></li>
            <li><a href="{{route('product')}}">Jackets and Coats</a></li>
          </ul>
          <!-- END DROPDOWN MENU -->
        </li>
        <li class="dropdown dropdown-megamenu">
          <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
            {{ trans('f_menu.clothe_mens') }}

          </a>
          <ul class="dropdown-menu">
            <li>
              <div class="header-navigation-content">
                <div class="row">
                  <div class="col-md-4 header-navigation-col">
                    <h4>Footwear</h4>
                    <ul>
                      <li><a href="{{route('product')}}">Astro Trainers</a></li>
                      <li><a href="{{route('product')}}">Basketball Shoes</a></li>
                      <li><a href="{{route('product')}}">Boots</a></li>
                      <li><a href="{{route('product')}}">Canvas Shoes</a></li>
                      <li><a href="{{route('product')}}">Football Boots</a></li>
                      <li><a href="{{route('product')}}">Golf Shoes</a></li>
                      <li><a href="{{route('product')}}">Hi Tops</a></li>
                      <li><a href="{{route('product')}}">Indoor and Court Trainers</a></li>
                    </ul>
                  </div>
                  <div class="col-md-4 header-navigation-col">
                    <h4>{{ trans('f_menu.clothing') }}</h4>
                    <ul>
                      <li><a href="{{route('product')}}">Base Layer</a></li>
                      <li><a href="{{route('product')}}">Character</a></li>
                      <li><a href="{{route('product')}}">Chinos</a></li>
                      <li><a href="{{route('product')}}">Combats</a></li>
                      <li><a href="{{route('product')}}">Cricket Clothing</a></li>
                      <li><a href="{{route('product')}}">Fleeces</a></li>
                      <li><a href="{{route('product')}}">Gilets</a></li>
                      <li><a href="{{route('product')}}">Golf Tops</a></li>
                    </ul>
                  </div>
                  <div class="col-md-4 header-navigation-col">
                    <h4>Accessories</h4>
                    <ul>
                      <li><a href="{{route('product')}}">Belts</a></li>
                      <li><a href="{{route('product')}}">Caps</a></li>
                      <li><a href="{{route('product')}}">Gloves, Hats and Scarves</a></li>
                    </ul>

                    <h4>Clearance</h4>
                    <ul>
                      <li><a href="{{route('product')}}">Jackets</a></li>
                      <li><a href="{{route('product')}}">Bottoms</a></li>
                    </ul>
                  </div>
                  <div class="col-md-12 nav-brands">
                    <ul>
                      <li><a href="{{route('product')}}"><img title="esprit" alt="esprit" src="/assets/themes/pages/img/brands/esprit.jpg"></a></li>
                      <li><a href="{{route('product')}}"><img title="gap" alt="gap" src="/assets/themes/pages/img/brands/gap.jpg"></a></li>
                      <li><a href="{{route('product')}}"><img title="next" alt="next" src="/assets/themes/pages/img/brands/next.jpg"></a></li>
                      <li><a href="{{route('product')}}"><img title="puma" alt="puma" src="/assets/themes/pages/img/brands/puma.jpg"></a></li>
                      <li><a href="{{route('product')}}"><img title="zara" alt="zara" src="/assets/themes/pages/img/brands/zara.jpg"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </li>
        <li><a href="shop-item.html">{{ trans('f_menu.clothe_kids') }}</a></li>
        <li class="dropdown dropdown100 nav-catalogue">
          <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
            {{ trans('f_menu.new') }}

          </a>
          <ul class="dropdown-menu">
            <li>
              <div class="header-navigation-content">
                <div class="row">
                  <div class="col-md-3 col-sm-4 col-xs-6">
                    <div class="product-item">
                      <div class="pi-img-wrapper">
                        <a href="shop-item.html"><img src="/assets/themes/pages/img/products/model4.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                      </div>
                      <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                      <div class="pi-price">$29.00</div>
                      <a href="javascript:;" class="btn btn-default add2cart">{{trans('button.add_cart')}}</a>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-4 col-xs-6">
                    <div class="product-item">
                      <div class="pi-img-wrapper">
                        <a href="shop-item.html"><img src="/assets/themes/pages/img/products/model3.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                      </div>
                      <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                      <div class="pi-price">$29.00</div>
                      <a href="javascript:;" class="btn btn-default add2cart">{{trans('button.add_cart')}}</a>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-4 col-xs-6">
                    <div class="product-item">
                      <div class="pi-img-wrapper">
                        <a href="shop-item.html"><img src="/assets/themes/pages/img/products/model7.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                      </div>
                      <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                      <div class="pi-price">$29.00</div>
                      <a href="javascript:;" class="btn btn-default add2cart">{{trans('button.add_cart')}}</a>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-4 col-xs-6">
                    <div class="product-item">
                      <div class="pi-img-wrapper">
                        <a href="shop-item.html"><img src="/assets/themes/pages/img/products/model4.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                      </div>
                      <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                      <div class="pi-price">$29.00</div>
                      <a href="javascript:;" class="btn btn-default add2cart">{{trans('button.add_cart')}}</a>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
            {{ trans('f_menu.pages') }}
          </a>

          <ul class="dropdown-menu">
            <li class="active"><a href="{{route('product')}}">Product List</a></li>
            <li><a href="{{route('page.about')}}">{{trans('f_menu.about_us')}}</a></li>
            <li><a href="{{route('page.contact')}}">{{trans('f_menu.contact_us')}}</a></li>
            <li><a href="{{route('page.faqs')}}">{{trans('f_menu.faqs')}}</a></li>
          </ul>
        </li>

        <!-- BEGIN TOP SEARCH -->
        <li class="menu-search">
          <span class="sep"></span>
          <i class="fa fa-search search-btn"></i>
          <div class="search-box">
            <form action="#">
              <div class="input-group">
                <input type="text" placeholder="{{ trans('f_menu.search') }}" class="form-control">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="submit">{{ trans('f_menu.search') }}</button>
                </span>
              </div>
            </form>
          </div>
        </li>
        <!-- END TOP SEARCH -->
      </ul>
    </div>
    <!-- END NAVIGATION -->
  </div>
</div>
<!-- Header END -->
