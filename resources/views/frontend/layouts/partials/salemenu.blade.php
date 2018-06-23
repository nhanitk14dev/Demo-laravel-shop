<div class="row margin-bottom-40">
  <!-- BEGIN SALE PRODUCT -->
  <div class="col-md-12 sale-product">
    <h2>{{ trans('f_product.newpro') }}</h2>
    <div class="owl-carousel owl-carousel5">
      @foreach($product_new as $new)
          <div class="product-item">
            <div class="pi-img-wrapper">
              <img src="{{$new->photo_path_medium }}" class="img-responsive" alt="Đầm">
              <div>
                <a href="{{$new->photo_path_large }}" class="btn btn-default fancybox-button">{{trans('button.zoom')}}</a>
                <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">{{trans('button.view')}}</a>
              </div>
            </div>
            <h3><a href="{{ route('front.product.show', $new->slug) }}">{!! $new->name !!}</a></h3>
            <div class="pi-price">{!! $new->unit_price !!} đ</div>
            <a href="javascript:;" class="btn btn-default addCart" id="{{ $new->id }}">{{trans('button.add_cart')}}</a>
            <div class="sticker sticker-sale"></div>
          </div>
      @endforeach
  </div>
  <!-- END SALE PRODUCT -->
</div>
