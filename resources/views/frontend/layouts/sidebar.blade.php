<div id="sidebar" class="span3">
	<div class="well well-small"><a id="myCart" href="product_summary.html"><img src="/assets/themes/images/ico-cart.png" alt="cart">3 {!! trans('f_cart.products') !!}<span class="badge badge-warning pull-right">155.000 đ</span></a></div>
	<ul id="sideManu" class="nav nav-tabs nav-stacked">
		@foreach($composer_categories as $category)
			<li class="subMenu open"><a> {!! $category->name !!}</a>
				@if($category->children->count())
					<ul>
						@foreach($category->children as $rs)
							<li>
								<a class="active" href="{{route('front.product.index')}}"><i class="icon-chevron-right"></i>{!! $rs->name !!}</a>
							</li>
						@endforeach
					</ul>
				@endif
			</li>
		@endforeach
	</ul>
	<br/>
	<div class="thumbnail">
		<img src="/assets/themes/images/products/panasonic.jpg" alt="Bootshop panasonoc New camera"/>
		<div class="caption">
			<h5>Máy Ảnh</h5>
			<h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào giỏ<i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">222.000 đ</a></h4>
		</div>
	</div><br/>
	<div class="thumbnail">
		<img src="/assets/themes/images/products/rauqua1.jpg" title="Bootshop New Kindel" alt="Bootshop Kindel">
		<div class="caption">
			<h5>Rau quả</h5>
			<h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào giỏ<i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">22.000 đ</a></h4>
		</div>
	</div><br/>
	<div class="thumbnail">
		<img src="/assets/themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
		<div class="caption">
			<h5>Thanh Toán</h5>
		</div>
	</div>
</div>