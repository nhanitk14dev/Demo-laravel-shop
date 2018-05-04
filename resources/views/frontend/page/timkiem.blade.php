@extends('frontend.layouts.master')

@section('content')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tìm kiếm</h4>
							<div class="beta-products-details">
								<p class="pull-left" style="color: red">Đã tìm thấy {{count($product)}} sản phẩm có liên quan đến từ khoá</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($product as $pr)
								<div class="col-sm-3">
									<div class="single-item">
										@if($pr->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Giảm 30%</div></div>
										@endif

										<div class="single-item-header">
											<a href="{{route('chitiet_sanpham',$pr->id)}}"><img src="source/image/product/{{$pr->image}}" alt="" height="250px" width="100%" ></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$pr->name}}</p>
											<p class="single-item-price">
												@if($pr->promotion_price==0)
													<span class="flash-sale">{{number_format($pr->unit_price)}} đồng</span>
												@else
													<span class="flash-del" style="font-size: 15px">{{number_format($pr->unit_price)}} đồng</span>
													<span class="flash-sale">{{number_format($pr->promotion_price)}} đồng</span>
												@endif
												
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$pr->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitiet_sanpham',$pr->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row">
								{{$product->links()}}<!--sử dụng phân trang-->
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection