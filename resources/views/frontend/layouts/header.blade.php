<div id="header">
	<div class="container">
		<div id="welcomeLine" class="row">
			<div class="span6">Xin Chào<strong> Khách Hàng 1</strong></div>
			<div class="span6">
				<div class="pull-right">
					<span class="btn btn-mini">VI</span>
					<a href="product_summary.html"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ 3 ] sản phẩm</span> </a> 
				</div>
			</div>
		</div>
		<!-- Navbar ================================================== -->
		<div id="logoArea" class="navbar">
			<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<div class="navbar-inner">
				<a class="brand" href="index.html"><img src="/assets/themes/images/logo1.png" alt="Bootsshop"/></a>
				<form class="form-inline navbar-search" method="post" action="products.html" >
					<input id="srchFld" class="srchTxt" type="text" />
					<select class="srchTxt">
						<option>Tất cả</option>
						<option>Quần Áo</option>
						<option>Sức Khỏe & Làm đẹp</option>
						<option>Thể Thao & Tin Tức</option>
						<option>Giải Trí</option>
					</select> 
					<button type="submit" id="submitButton" class="btn btn-primary">Go</button>
				</form>
				<ul id="topMenu" class="nav pull-right">
					<li class=""><a href="{{ route('front.product.index') }}">Sản Phẩm</a></li>
					<li class=""><a href="{{ route('front.about') }}">Giới Thiệu</a></li>
					<li class=""><a href="{{ route('front.contact') }}">Liên Hệ</a></li>
					<li class=""><a href="{{ route('front.faq') }}">FAQ</a></li>
					<li class="">
						<a href="#login" role="button" data-toggle="modal" ><span class="btn btn-large btn-success">Đăng Nhập</span></a>
						<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h3>Đăng nhập</h3>
							</div>
							<div class="modal-body">
								<form class="form-horizontal loginFrm">
									<div class="control-group">								
										<input type="text" id="inputEmail" placeholder="Email">
									</div>
									<div class="control-group">
										<input type="password" id="inputPassword" placeholder="Password">
									</div>
									<div class="control-group">
										<label class="checkbox">
											<input type="checkbox"> Ghi nhớ đăng nhập
										</label>
									</div>
								</form>		
								<button type="submit" class="btn btn-success">Đăng Nhập</button>
								<button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- Header End====================================================================== -->