@extends('frontend.layouts.master')

@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{$loaisp_ten->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{trans ('routes.home') }}">Home1</a> / <span>Sản phẩm</span>

				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($loaisp as $l)
							<li><a href="{{route('loaisanpham',$l->id)}}">{{$l->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left alert-success" >Tìm thấy {{count($sp_theoloai)}} sản phẩm mới</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@foreach($sp_theoloai as $loai)
								<div class="col-sm-4">
									<div class="single-item">
										@if( $loai->promotion_price !=0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Giảm 30%</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chitiet_sanpham',$loai->id)}}"><img src="source/image/product/{{$loai->image}}" alt="" height="250px" width="100%"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $loai->name}}</p>
											<p class="single-item-price">
												@if($loai->promotion_price==0)
														<span class="flash-sale" style="font-size: 16px">{{number_format($loai->unit_price)}} đồng</span>
													@else
														<span class="flash-del" style="font-size: 16px">{{number_format($loai->unit_price)}} đồng</span>
														<span class="flash-sale" style="font-size: 18px">{{number_format($loai->promotion_price)}} đồng</span>
													@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$loai->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitiet_sanpham',$loai->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
	
							@endforeach
								
							</div>
							
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left alert-danger">Tìm thấy {{count($sp_khac)}} sản phẩm khác</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@foreach($sp_khac as $khac)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img src="source/image/product/{{$khac->image}}" alt="" height="250px" width="100%"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$khac->name}}</p>
											<p class="single-item-price">
												@if($khac->promotion_price==0)
														<span class="flash-sale" style="font-size: 18px">{{number_format($khac->unit_price)}} đồng</span>
													@else
														<span class="flash-del" style="font-size: 18px">{{number_format($khac->unit_price)}} đồng</span>
														<span class="flash-sale" style="font-size: 20px">{{number_format($khac->promotion_price)}} đồng</span>
													@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$khac->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitiet_sanpham',$khac->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div><!--end row-->
							<div>{{$sp_khac->links()}}</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection