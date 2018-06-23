@extends('frontend.layouts.master')

@section('content')
    <div class="main">
      <div class="container">
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Shopping cart</h1>
            <div class="goods-page">

              @include('frontend.layouts.partials.message')

                <div class="goods-data clearfix">

                      <div class="table-wrapper-responsive">
                        <table summary="Shopping cart">
                            <tr>
                              <th class="goods-page-image">Image</th>
                              <th class="goods-page-description">Description</th>
                              <th class="goods-page-quantity">Quantity</th>
                              <th class="goods-page-price">Unit price</th>
                              <th class="goods-page-total" colspan="2">Total</th>
                            </tr>


                            <!-- start-form-update-cart -->
                            @foreach($carts as $rs)
                            <form action=""  method="GET">
                                  <input type="hidden" name="_token" value="{!!csrf_token()!!}">

                                  <tr>
                                    <td class="goods-page-image">
                                      <a href="javascript:;">
                                        <img src="{!! assetStorage('product'.'/'.$rs->options->img) !!}" alt="{!! $rs->name !!}">
                                       </a>
                                    </td>
                                    <td class="goods-page-description">
                                      <h3><a href="javascript:;">{!! $rs->name !!}</a></h3>
                                      <p><strong>{!! $rs->qty !!}</strong> - Color: {!! $rs->options->color !!}; Size: {!! $rs->options->size !!}</p>
                                      <em>More info is here</em>
                                    </td>
                                    <td class="goods-page-quantity">
                                      <div class="product-quantity">
                                          <input id="product-quantity" type="number" value="{{ $rs->qty }}" readonly class="form-control input-sm">
                                      </div>
                                    </td>
                                    <td class="goods-page-price">
                                      <strong>{{ $rs->price }}<span> vnd</span></strong>
                                    </td>
                                    <td class="goods-page-total">
                                      <strong>{{ $rs->subtotal() }}<span> vnd</span></strong>
                                    </td>
                                    <td class="del-goods-col">
                                      <a href="javascript:void(0);" data-id="{{$rs->rowId}}" id="update_cart"
                                          class="glyphicon glyphicon-refresh" style="color: green;"
                                          data-content="-1" data-rowId="{{$rs->rowId}}" >
                                      </a>
                                      <a class="del-goods" href="{{ route('removecart', $rs->rowId)}}">&nbsp;</a>
                                    </td>
                                  </tr>
                                </form>
                          <!-- end-form-update-cart -->
                              @endforeach

                        </table>
                      </div>

                <div class="shopping-total">
                  <ul>
                    <li>
                      <em>Sub total</em>
                      <strong class="price">{!! Cart::subtotal() !!}<span> vnd</span></strong>
                    </li>
                    <li>
                      <em>Shipping cost</em>
                      <strong class="price"><span>%</span>3.00</strong>
                    </li>
                    <li class="shopping-total-price">
                      <em>Total</em>
                      <strong class="price">{!! Cart::subtotal() !!}<span> vnd</span></strong>
                    </li>
                  </ul>
                </div>
              </div>
              <button type="button">
                <a href="{{ route('product') }}">Continue shopping</a>
                <i class="fa fa-shopping-cart"></i>
              </button>
              <button class="btn btn-primary" type="submit">Checkout <i class="fa fa-check"></i></button>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

        <!-- BEGIN SIMILAR PRODUCTS -->
        <div class="row margin-bottom-40">
          <div class="col-md-12 col-sm-12">
            <h2>Most popular products</h2>
            <div class="owl-carousel owl-carousel4">
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
            </div>
          </div>
        </div>
        <!-- END SIMILAR PRODUCTS -->
      </div>
    </div>

@endsection
