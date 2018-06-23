@extends('frontend.layouts.master')

@section('content')
<!-- Body BEGIN -->
    @include('frontend.layouts.partials.slider')
    <div class="main">
      <div class="container">
        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
            @include('frontend.layouts.partials.salemenu')
        <!-- END SALE PRODUCT & NEW ARRIVALS -->

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40 ">
          <!-- BEGIN SIDEBAR -->
              @include('frontend.layouts.partials.sidebar')
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-8">
            <h2>{{ trans('f_product.threepro') }}</h2>
            <div class="owl-carousel owl-carousel3">
              <!-- start item -->
              @foreach($product_other as $other)
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="{{$other->photo_path_medium }}" class="img-responsive" alt="{!! $other->name !!}">
                    <div>
                      <a href="{{$other->photo_path_medium }}" class="btn btn-default fancybox-button">{{trans('button.zoom')}}</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">{{trans('button.view')}}</a>
                    </div>
                  </div>
                  <h3><a href="{{ route('front.product.show', $other->slug) }}">{!! $other->name !!}</a></h3>
                  <div class="pi-price">{!! $other->unit_price !!} đ</div>
                  <!-- <a href="javascript:;" class="btn btn-default add2cart">{{trans('button.add_cart')}}</a> -->
                  <a href="{{route('addcart',$other->slug)}}" class="btn btn-default add2cart">{{trans('button.add_cart')}}</a>
                  <div class="sticker sticker-new"></div>
                </div>
              @endforeach
              <!-- end item -->
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

        <!-- BEGIN TWO PRODUCTS & PROMO -->
        <div class="row margin-bottom-35 ">
          <!-- BEGIN TWO PRODUCTS -->
          <div class="col-md-6 two-items-bottom-items">
            <h2>{{ trans('f_product.twopro') }}</h2>
            <div class="owl-carousel owl-carousel2">
              @foreach($product_other as $other)
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="{{$other->photo_path_medium }}" class="img-responsive" alt="{!! $other->name !!}">
                      <div>
                        <a href="{{$other->photo_path_medium }}" class="btn btn-default fancybox-button">{{trans('button.zoom')}}</a>
                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">{{trans('button.view')}}</a>
                      </div>
                    </div>
                    <h3><a href="{{ route('front.product.show', $other->slug) }}">{!! $other->name !!}</a></h3>
                    <div class="pi-price">{!! $other->unit_price !!} đ</div>
                    <a href="javascript:;" class="btn btn-default add2cart">{{trans('button.add_cart')}}</a>
                    <div class="sticker sticker-new"></div>
                  </div>
                @endforeach
            </div>
          </div>
          <!-- END TWO PRODUCTS -->
          <!-- BEGIN PROMO -->
          <div class="col-md-6 shop-index-carousel">
            <div class="content-slider">
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="/assets/themes/pages/img/index-sliders/slide1.jpg" class="img-responsive" alt="Đầm">
                  </div>
                  <div class="item">
                    <img src="/assets/themes/pages/img/index-sliders/slide2.jpg" class="img-responsive" alt="Đầm">
                  </div>
                  <div class="item">
                    <img src="/assets/themes/pages/img/index-sliders/slide3.jpg" class="img-responsive" alt="Đầm">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END PROMO -->
        </div>
        <!-- END TWO PRODUCTS & PROMO -->
      </div>
    </div>

    <!-- BEGIN STEPS -->
    <!-- <div class="steps-block steps-block-red">
      <div class="container">
        <div class="row">
          <div class="col-md-4 steps-block-col">
            <i class="fa fa-truck"></i>
            <div>
              <h2>Free shipping</h2>
              <em>Express delivery withing 3 days</em>
            </div>
            <span>&nbsp;</span>
          </div>
          <div class="col-md-4 steps-block-col">
            <i class="fa fa-gift"></i>
            <div>
              <h2>Daily Gifts</h2>
              <em>3 Gifts daily for lucky customers</em>
            </div>
            <span>&nbsp;</span>
          </div>
          <div class="col-md-4 steps-block-col">
            <i class="fa fa-phone"></i>
            <div>
              <h2>477 505 8877</h2>
              <em>24/7 customer care available</em>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- END STEPS -->

    <!-- BEGIN fast {{trans('button.view')}} of a product -->
    <div id="product-pop-up" style="display: none; width: 700px;">
            <div class="product-page product-pop-up">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-3">
                  <div class="product-main-image">
                    <img src="/assets/themes/pages/img/products/model7.jpg" alt="đầm xanh " class="img-responsive">
                  </div>
                  <div class="product-other-images">
                    <a href="javascript:;" class="active"><img alt="Đầm" src="/assets/themes/pages/img/products/model3.jpg"></a>
                    <a href="javascript:;"><img alt="Đầm" src="/assets/themes/pages/img/products/model4.jpg"></a>
                    <a href="javascript:;"><img alt="Đầm" src="/assets/themes/pages/img/products/model5.jpg"></a>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-9">
                  <h2>đầm xanh </h2>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span>$</span>47.00</strong>
                      <em>$<span>62.00</span></em>
                    </div>
                    <div class="availability">
                      Có sẵn: <strong>Trong kho</strong>
                    </div>
                  </div>
                  <div class="description">
                    <p>mô tả màu sắc hình ảnh sản phẩm.</p>
                  </div>
                  <div class="product-page-options">
                    <div class="pull-left">
                      <label class="control-label">Size:</label>
                      <select class="form-control input-sm">
                        <option>L</option>
                        <option>M</option>
                        <option>XL</option>
                      </select>
                    </div>
                    <div class="pull-left">
                      <label class="control-label">Color:</label>
                      <select class="form-control input-sm">
                        <option>Xanh</option>
                        <option>Đỏ</option>
                        <option>Đen</option>
                      </select>
                    </div>
                  </div>
                  <div class="product-page-cart">
                    <div class="product-quantity">
                        <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
                    </div>
                    <button class="btn btn-primary" type="submit">{{trans('button.add_cart')}}</button>
                    <a href="shop-item.html" class="btn btn-default">{{trans('button.view')}} {{trans('button.add_cart')}}</a>
                  </div>
                </div>

                <div class="sticker sticker-sale"></div>
              </div>
            </div>
    </div>
  @include('frontend.layouts.partials.brands')
@endsection
