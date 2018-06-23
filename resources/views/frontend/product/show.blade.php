@extends('frontend.layouts.master')

@section('content')
<!-- Body BEGIN -->
    <div class="main">
      <div class="container">

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40 ">
          <!-- BEGIN SIDEBAR -->
              @include('frontend.layouts.partials.sidebar')
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-7">
            <div class="product-page">
              <div class="row">
                <form class="" action="{{ route('addcart',$products->slug )}}" method="POST">
                  <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                    <div class="col-md-6 col-sm-6">
                          <div class="product-main-image">
                            <img src="{{ $products->photo->arrayPath(true)['medium'] }}" alt="Cool green dress with red bell" class="img-responsive"
                            data-BigImgsrc="{{ $products->photo->arrayPath(true)['large'] }}">
                          </div>
                          <div class="product-other-images">
                            @foreach($products->_photos as $photo)
                              <a href="{{ $photo->arrayPath(true)['large'] }}" class="fancybox-button" rel="photos-lib">
                                <img alt="Berry Lace Dress" src="{{ $photo->arrayPath(true)['large'] }}">
                              </a>
                            @endforeach
                          </div>
                      </div>
                    <div class="col-md-6 col-sm-6">
                        <h1>{!! $products->name !!}</h1>
                        <div class="price-availability-block clearfix">
                            <div class="price">
                              <strong>{!! $products->unit_price !!} đ</strong>
                              <em><span>{!! $products->promotion_price !!} đ</span></em>
                            </div>
                            <div class="availability">
                              Availability: <strong>In Stock</strong>
                            </div>
                        </div>
                        <div class="description">
                          <p>{!! $products->remark !!} </p>
                        </div>
                        <div class="product-page-options">
                          <div class="pull-left">
                            <label class="control-label">Size:</label>
                            <select class="form-control input-sm" name='size'>
                              @foreach($products->sizes as $size)
                                <option  id="product-size" value="{!! $size->name !!}">{!! $size->name !!}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="pull-left">
                            <label class="control-label">Color:</label>
                            <select class="form-control input-sm" name='color'>
                            @foreach($products->colors as $color)
                              <option  id="product-color" value="{!! $color->name !!}">{!! $color->name !!}</option>
                            @endforeach
                            </select>
                          </div>
                      </div>
                      <div class="product-page-cart">
                          <div class="product-quantity">
                              <input id="product-quantity" name="qty" type="number" value="1" readonly class="form-control input-sm">
                          </div>
                          <button class="btn btn-primary addCart" type="submit" id="{{ $products->id }}" >
                            {{trans('button.add_cart')}}
                          </button>
                      </div>

                      <!-- end form add to cart -->

                        <!-- review -->
                        <div class="review">
                          <input type="range" value="4" step="0.25" id="backing4">
                          <div class="rateit" data-rateit-backingfld="#backing4" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                          </div>
                          <a href="javascript:;">7 reviews</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="javascript:;">Write a review</a>
                        </div>
                        <ul class="social-icons">
                          <li><a class="facebook" data-original-title="facebook" href="javascript:;"></a></li>
                          <li><a class="twitter" data-original-title="twitter" href="javascript:;"></a></li>
                          <li><a class="googleplus" data-original-title="googleplus" href="javascript:;"></a></li>
                          <li><a class="evernote" data-original-title="evernote" href="javascript:;"></a></li>
                          <li><a class="tumblr" data-original-title="tumblr" href="javascript:;"></a></li>
                        </ul>
                    </div>
                </form>
                <!-- end-form-cart -->
                <!-- end-column-row-6 -->
              </div>

              <div class="row">
                <div class="product-page-content">
                    <ul id="myTab" class="nav nav-tabs">
                      <li><a href="#Description" data-toggle="tab">Description</a></li>
                      <li><a href="#Information" data-toggle="tab">Information</a></li>
                      <li class="active"><a href="#Reviews" data-toggle="tab">Reviews (2)</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div class="tab-pane fade" id="Description">
                        <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. </p>
                      </div>
                      <div class="tab-pane fade" id="Information">
                        <table class="datasheet">
                          <tr>
                            <th colspan="2">Additional features</th>
                          </tr>
                          <tr>
                            <td class="datasheet-features-type">Value 1</td>
                            <td>21 cm</td>
                          </tr>
                          <tr>
                            <td class="datasheet-features-type">Value 2</td>
                            <td>700 gr.</td>
                          </tr>
                          <tr>
                            <td class="datasheet-features-type">Value 3</td>
                            <td>10 person</td>
                          </tr>
                          <tr>
                            <td class="datasheet-features-type">Value 4</td>
                            <td>14 cm</td>
                          </tr>
                          <tr>
                            <td class="datasheet-features-type">Value 5</td>
                            <td>plastic</td>
                          </tr>
                        </table>
                      </div>
                      <div class="tab-pane fade in active" id="Reviews">
                        <!--<p>There are no reviews for this product.</p>-->
                        <div class="review-item clearfix">
                          <div class="review-item-submitted">
                            <strong>Bob</strong>
                            <em>30/12/2013 - 07:37</em>
                            <div class="rateit" data-rateit-value="5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                          </div>
                          <div class="review-item-content">
                              <p>Sed velit quam, auctor id semper a, hendrerit eget justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis vel arcu pulvinar dolor tempus feugiat id in orci. Phasellus sed erat leo. Donec luctus, justo eget ultricies tristique, enim mauris bibendum orci, a sodales lectus purus ut lorem.</p>
                          </div>
                        </div>
                        <div class="review-item clearfix">
                          <div class="review-item-submitted">
                            <strong>Mary</strong>
                            <em>13/12/2013 - 17:49</em>
                            <div class="rateit" data-rateit-value="2.5" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                          </div>
                          <div class="review-item-content">
                              <p>Sed velit quam, auctor id semper a, hendrerit eget justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis vel arcu pulvinar dolor tempus feugiat id in orci. Phasellus sed erat leo. Donec luctus, justo eget ultricies tristique, enim mauris bibendum orci, a sodales lectus purus ut lorem.</p>
                          </div>
                        </div>

                        <!-- BEGIN FORM-->
                        <form action="#" class="reviews-form" role="form">
                          <h2>Write a review</h2>
                          <div class="form-group">
                            <label for="name">Name <span class="require">*</span></label>
                            <input type="text" class="form-control" id="name">
                          </div>
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email">
                          </div>
                          <div class="form-group">
                            <label for="review">Review <span class="require">*</span></label>
                            <textarea class="form-control" rows="8" id="review"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="email">Rating</label>
                            <input type="range" value="4" step="0.25" id="backing5">
                            <div class="rateit" data-rateit-backingfld="#backing5" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                            </div>
                          </div>
                          <div class="padding-top-20">
                            <button type="submit" class="btn btn-primary">Send</button>
                          </div>
                        </form>
                        <!-- END FORM-->
                      </div>
                    </div>
                  </div>

                  <div class="sticker sticker-sale"></div>
              </div>
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
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="/assets/themes/pages/img/products/k4.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="/assets/themes/pages/img/products/k4.jpg" class="btn btn-default fancybox-button">{{trans('button.zoom')}}</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="javascript:;" class="btn btn-default add2cart">{{trans('button.add_cart')}}</a>
                </div>
              </div>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="/assets/themes/pages/img/products/k2.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="/assets/themes/pages/img/products/k2.jpg" class="btn btn-default fancybox-button">{{trans('button.zoom')}}</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="javascript:;" class="btn btn-default add2cart">{{trans('button.add_cart')}}</a>
                </div>
              </div>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="/assets/themes/pages/img/products/k3.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="/assets/themes/pages/img/products/k3.jpg" class="btn btn-default fancybox-button">{{trans('button.zoom')}}</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">{{trans('button.view')}}</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="javascript:;" class="btn btn-default add2cart">{{trans('button.add_cart')}}</a>
                </div>
              </div>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="/assets/themes/pages/img/products/k1.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="/assets/themes/pages/img/products/k1.jpg" class="btn btn-default fancybox-button">{{trans('button.zoom')}}</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">{{trans('button.view')}}</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="javascript:;" class="btn btn-default add2cart">{{trans('button.add_cart')}}</a>
                </div>
              </div>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="/assets/themes/pages/img/products/k4.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="/assets/themes/pages/img/products/k4.jpg" class="btn btn-default fancybox-button">{{trans('button.zoom')}}</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">{{trans('button.view')}}</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="javascript:;" class="btn btn-default add2cart">{{trans('button.add_cart')}}</a>
                </div>
              </div>
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="/assets/themes/pages/img/products/k3.jpg" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                      <a href="/assets/themes/pages/img/products/k3.jpg" class="btn btn-default fancybox-button">{{trans('button.zoom')}}</a>
                      <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">{{trans('button.view')}}</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
                  <div class="pi-price">$29.00</div>
                  <a href="javascript:;" class="btn btn-default add2cart">{{trans('button.add_cart')}}</a>
                </div>
              </div>
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
                    <img src="/assets/themes/pages/img/index-sliders/slide1.jpg" class="img-responsive" alt="Berry Lace Dress">
                  </div>
                  <div class="item">
                    <img src="/assets/themes/pages/img/index-sliders/slide2.jpg" class="img-responsive" alt="Berry Lace Dress">
                  </div>
                  <div class="item">
                    <img src="/assets/themes/pages/img/index-sliders/slide3.jpg" class="img-responsive" alt="Berry Lace Dress">
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
    <div class="steps-block steps-block-red">
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
    </div>
    <!-- END STEPS -->

    <!-- BEGIN fast view of a product -->
    <div id="product-pop-up" style="display: none; width: 700px;">
            <div class="product-page product-pop-up">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-3">
                  <div class="product-main-image">
                    <img src="/assets/themes/pages/img/products/model7.jpg" alt="Cool green dress with red bell" class="img-responsive">
                  </div>
                  <div class="product-other-images">
                    <a href="javascript:;" class="active"><img alt="Berry Lace Dress" src="/assets/themes/pages/img/products/model3.jpg"></a>
                    <a href="javascript:;"><img alt="Berry Lace Dress" src="/assets/themes/pages/img/products/model4.jpg"></a>
                    <a href="javascript:;"><img alt="Berry Lace Dress" src="/assets/themes/pages/img/products/model5.jpg"></a>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-9">
                  <h2>Cool green dress with red bell</h2>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span>$</span>47.00</strong>
                      <em>$<span>62.00</span></em>
                    </div>
                    <div class="availability">
                      Availability: <strong>In Stock</strong>
                    </div>
                  </div>
                  <div class="description">
                    <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.</p>
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
                        <option>Red</option>
                        <option>Blue</option>
                        <option>Black</option>
                      </select>
                    </div>
                  </div>
                  <div class="product-page-cart">
                    <div class="product-quantity">
                        <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
                    </div>
                    <button class="btn btn-primary" type="submit">{{trans('button.add_cart')}}</button>
                    <a href="shop-item.html" class="btn btn-default">More details</a>
                  </div>
                </div>

                <div class="sticker sticker-sale"></div>
              </div>
            </div>
    </div>
  @include('frontend.layouts.partials.brands')
@endsection
