@extends('frontend.layouts.master')

@section('content')

@include('frontend.layouts.slider')

	<style type="text/css" id="enject"></style>
	<div id="mainBody">
		<div class="container">
			<div class="row">
				<!-- Sidebar ================================================== -->
				@include('frontend.layouts.sidebar')
				<!-- Sidebar end=============================================== -->
				<div class="span9">		
					<div class="well well-small">
						<h4>Sản Phẩm Mới<small class="pull-right">200+ sản phẩm mới</small></h4>
						<div class="row-fluid">
							<div id="featured" class="carousel slide">
								<div class="carousel-inner">
									<div class="item active">
										<ul class="thumbnails">
											<li class="span3">
												<div class="thumbnail">
													<i class="tag"></i>
													<a href="{{route('front.product.show')}}"><img src="/assets/themes/images/products/mayanh.jpg" alt=""></a>
													<div class="caption">
														<h5>Tên sản phẩm</h5>
														<h4><a class="btn" href="{{route('front.product.show')}}"><i class="icon-zoom-in"></i></a> <span class="pull-right">222.000 đ</span></h4>
													</div>
												</div>
											</li>
											<li class="span3">
												<div class="thumbnail">
													<i class="tag"></i>
													<a href="{{route('front.product.show')}}"><img src="/assets/themes/images/products/quanaonam.jpg" alt=""></a>
													<div class="caption">
														<h5>Tên sản phẩm</h5>
														<h4><a class="btn" href="{{route('front.product.show')}}"><i class="icon-zoom-in"></i></a> <span class="pull-right">222.000 đ</span></h4>
													</div>
												</div>
											</li>
											<li class="span3">
												<div class="thumbnail">
													<i class="tag"></i>
													<a href="{{route('front.product.show')}}"><img src="/assets/themes/images/products/quanaonam.jpg" alt=""></a>
													<div class="caption">
														<h5>Tên sản phẩm</h5>
														<h4><a class="btn" href="{{route('front.product.show')}}"><i class="icon-zoom-in"></i></a> <span class="pull-right">222.000 đ</span></h4>
													</div>
												</div>
											</li>
											<li class="span3">
												<div class="thumbnail">
													<i class="tag"></i>
													<a href="{{route('front.product.show')}}"><img src="/assets/themes/images/products/ao1.jpg" alt=""></a>
													<div class="caption">
														<h5>Tên sản phẩm</h5>
														<h4><a class="btn" href="{{route('front.product.show')}}"><i class="icon-zoom-in"></i></a> <span class="pull-right">222.000 đ</span></h4>
													</div>
												</div>
											</li>

										</ul>
									</div>
									<div class="item">
										<ul class="thumbnails">
											<li class="span3">
												<div class="thumbnail">
													<i class="tag"></i>
													<a href="{{route('front.product.show')}}"><img src="/assets/themes/images/products/quanaonam.jpg" alt=""></a>
													<div class="caption">
														<h5>Tên sản phẩm</h5>
														<h4><a class="btn" href="{{route('front.product.show')}}"><i class="icon-zoom-in"></i></a> <span class="pull-right">222.000 đ</span></h4>
													</div>
												</div>
											</li>
											<li class="span3">
												<div class="thumbnail">
													<i class="tag"></i>
													<a href="{{route('front.product.show')}}"><img src="/assets/themes/images/products/b4.jpg" alt=""></a>
													<div class="caption">
														<h5>Tên sản phẩm</h5>
														<h4><a class="btn" href="{{route('front.product.show')}}"><i class="icon-zoom-in"></i></a> <span class="pull-right">222.000 đ</span></h4>
													</div>
												</div>
											</li>
											<li class="span3">
												<div class="thumbnail">
													<i class="tag"></i>
													<a href="{{route('front.product.show')}}"><img src="/assets/themes/images/products/quanaonam1.jpg" alt=""></a>
													<div class="caption">
														<h5>Tên sản phẩm</h5>
														<h4><a class="btn" href="{{route('front.product.show')}}"><i class="icon-zoom-in"></i></a> <span class="pull-right">222.000 đ</span></h4>
													</div>
												</div>
											</li>
											<li class="span3">
												<div class="thumbnail">
													<i class="tag"></i>
													<a href="{{route('front.product.show')}}"><img src="/assets/themes/images/products/4.jpg" alt=""></a>
													<div class="caption">
														<h5>Tên sản phẩm</h5>
														<h4><a class="btn" href="{{route('front.product.show')}}"><i class="icon-zoom-in"></i></a> <span class="pull-right">222.000 đ</span></h4>
													</div>
												</div>
											</li>
										</ul>
									</div>
									<div class="item">
										<ul class="thumbnails">
											<li class="span3">
												<div class="thumbnail">
													<i class="tag"></i>
													<a href="{{route('front.product.show')}}"><img src="/assets/themes/images/products/5.jpg" alt=""></a>
													<div class="caption">
														<h5>Tên sản phẩm</h5>
														<h4><a class="btn" href="{{route('front.product.show')}}"><i class="icon-zoom-in"></i></a> <span class="pull-right">222.000 đ</span></h4>
													</div>
												</div>
											</li>
											<li class="span3">
												<div class="thumbnail">
													<i class="tag"></i>
													<a href="{{route('front.product.show')}}"><img src="/assets/themes/images/products/quanaonam1.jpg" alt=""></a>
													<div class="caption">
														<h5>Tên sản phẩm</h5>
														<h4><a class="btn" href="{{route('front.product.show')}}"><i class="icon-zoom-in"></i></a> <span class="pull-right">222.000 đ</span></h4>
													</div>
												</div>
											</li>
											<li class="span3">
												<div class="thumbnail">
													<i class="tag"></i>
													<a href="{{route('front.product.show')}}"><img src="/assets/themes/images/products/7.jpg" alt=""></a>
													<div class="caption">
														<h5>Tên sản phẩm</h5>
														<h4><a class="btn" href="{{route('front.product.show')}}"><i class="icon-zoom-in"></i></a> <span class="pull-right">222.000 đ</span></h4>
													</div>
												</div>
											</li>
											<li class="span3">
												<div class="thumbnail">
													<i class="tag"></i>
													<a href="{{route('front.product.show')}}"><img src="/assets/themes/images/products/ao1.jpg" alt=""></a>
													<div class="caption">
														<h5>Tên sản phẩm</h5>
														<h4><a class="btn" href="{{route('front.product.show')}}"><i class="icon-zoom-in"></i></a> <span class="pull-right">222.000 đ</span></h4>
													</div>
												</div>
											</li>
										</ul>
									</div>

								</div>
								<a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
								<a class="right carousel-control" href="#featured" data-slide="next">›</a>
							</div>
						</div>
					</div>
					<h4>Các sản phẩm liên quan</h4>
					<ul class="thumbnails">
						<li class="span3">
							<div class="thumbnail">
								<a  href="{{route('front.product.show')}}"><img src="/assets/themes/images/products/quanao.jpg" alt=""/></a>
								<div class="caption">
									<h5>Tên sản phẩm</h5>
									<p> 
										Mô tả sản phẩm 
									</p>
									<h4 style="text-align:center"><a class="btn" href="{{route('front.product.show')}}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào giỏ hàng<i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">222.000 đ</a></h4>
								</div>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<a  href="{{route('front.product.show')}}"><img src="/assets/themes/images/products/7.jpg" alt=""/></a>
								<div class="caption">
									<h5>Tên sản phẩm</h5>
									<p> 
										Mô tả sản phẩm 
									</p>
									<h4 style="text-align:center"><a class="btn" href="{{route('front.product.show')}}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào giỏ hàng<i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">222.000 đ</a></h4>
								</div>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<a  href="{{route('front.product.show')}}"><img src="/assets/themes/images/products/8.jpg" alt=""/></a>
								<div class="caption">
									<h5>Tên sản phẩm</h5>
									<p> 
										Mô tả sản phẩm 
									</p>
									<h4 style="text-align:center"><a class="btn" href="{{route('front.product.show')}}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào giỏ hàng<i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">222.000 đ</a></h4>
								</div>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<a  href="{{route('front.product.show')}}"><img src="/assets/themes/images/products/9.jpg" alt=""/></a>
								<div class="caption">
									<h5>Tên sản phẩm</h5>
									<p> 
										Mô tả sản phẩm 
									</p>
									<h4 style="text-align:center"><a class="btn" href="{{route('front.product.show')}}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào giỏ hàng<i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">222.000 đ</a></h4>
								</div>
							</div>
						</li>
						<li class="span3">
							<div class="thumbnail">
								<a  href="{{route('front.product.show')}}"><img src="/assets/themes/images/products/10.jpg" alt=""/></a>
								<div class="caption">
									<h5>Tên sản phẩm</h5>
									<p> 
										Mô tả sản phẩm 
									</p>
									<h4 style="text-align:center"><a class="btn" href="{{route('front.product.show')}}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào giỏ hàng<i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">222.000 đ</a></h4>
								</div>
							</div>
						</li>
						<!-- <li class="span3">
							<div class="thumbnail">
								<a  href="{{route('front.product.show')}}"><img src="/assets/themes/images/products/11.jpg" alt=""/></a>
								<div class="caption">
									<h5>Tên sản phẩm</h5>
									<p> 
										Mô tả sản phẩm 
									</p>
									<h4 style="text-align:center"><a class="btn" href="{{route('front.product.show')}}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào giỏ hàng<i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">222.000 đ</a></h4>
								</div>
							</div>
						</li> -->
					</ul>	

				</div>
			</div>
		</div>
	</div>
	
	<!-- Themes switcher section ============================================================================================= -->
	<div id="secectionBox">
		<div id="themeContainer">
			<div id="hideme" class="themeTitle">Style Selector</div>
			<div class="themeName">Oregional Skin</div>
			<div class="images style">
				<a href="/assets/themes/css/#" name="bootshop"><img src="/assets/themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>
				<a href="/assets/themes/css/#" name="businessltd"><img src="/assets/themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>
			</div>
			<div class="themeName">Bootswatch Skins (11)</div>
			<div class="images style">
				<a href="/assets/themes/css/#" name="amelia" title="Amelia"><img src="/assets/themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="spruce" title="Spruce"><img src="/assets/themes/switch/images/clr/spruce.png" alt="bootstrap business templates" ></a>
				<a href="/assets/themes/css/#" name="superhero" title="Superhero"><img src="/assets/themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="cyborg"><img src="/assets/themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="cerulean"><img src="/assets/themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="journal"><img src="/assets/themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="readable"><img src="/assets/themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a>	
				<a href="/assets/themes/css/#" name="simplex"><img src="/assets/themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="slate"><img src="/assets/themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="spacelab"><img src="/assets/themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="united"><img src="/assets/themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>
				<p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small>These are just examples and you can build your own color scheme in the backend.</small></p>
			</div>
			<div class="themeName">Background Patterns </div>
			<div class="images patterns">
				<a href="/assets/themes/css/#" name="pattern1"><img src="/assets/themes/switch/images/pattern/pattern1.png" alt="bootstrap business templates" class="active"></a>
				<a href="/assets/themes/css/#" name="pattern2"><img src="/assets/themes/switch/images/pattern/pattern2.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="pattern3"><img src="/assets/themes/switch/images/pattern/pattern3.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="pattern4"><img src="/assets/themes/switch/images/pattern/pattern4.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="pattern5"><img src="/assets/themes/switch/images/pattern/pattern5.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="pattern6"><img src="/assets/themes/switch/images/pattern/pattern6.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="pattern7"><img src="/assets/themes/switch/images/pattern/pattern7.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="pattern8"><img src="/assets/themes/switch/images/pattern/pattern8.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="pattern9"><img src="/assets/themes/switch/images/pattern/pattern9.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="pattern10"><img src="/assets/themes/switch/images/pattern/pattern10.png" alt="bootstrap business templates"></a>

				<a href="/assets/themes/css/#" name="pattern11"><img src="/assets/themes/switch/images/pattern/pattern11.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="pattern12"><img src="/assets/themes/switch/images/pattern/pattern12.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="pattern13"><img src="/assets/themes/switch/images/pattern/pattern13.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="pattern14"><img src="/assets/themes/switch/images/pattern/pattern14.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="pattern15"><img src="/assets/themes/switch/images/pattern/pattern15.png" alt="bootstrap business templates"></a>

				<a href="/assets/themes/css/#" name="pattern16"><img src="/assets/themes/switch/images/pattern/pattern16.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="pattern17"><img src="/assets/themes/switch/images/pattern/pattern17.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="pattern18"><img src="/assets/themes/switch/images/pattern/pattern18.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="pattern19"><img src="/assets/themes/switch/images/pattern/pattern19.png" alt="bootstrap business templates"></a>
				<a href="/assets/themes/css/#" name="pattern20"><img src="/assets/themes/switch/images/pattern/pattern20.png" alt="bootstrap business templates"></a>

			</div>
		</div>
	</div>
	<span id="themesBtn"></span>
@endsection