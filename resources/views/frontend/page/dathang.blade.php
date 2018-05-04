@extends('frontend.layouts.master')

@section('style')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
@endsection

@section('content')
<div class="container">
		<div id="content">
			@if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
              @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
            @endif
			<form action="{{route('checkout')}}" method="post" class="beta-form-checkout"  novalidate>
			<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-6">
						<h4>Đặt Hàng</h4>
						<p><i>(Trường hợp khách hàng ko đăng kí tài khoản)</i></p>
						<div class="space20">&nbsp;</div>
					
						<div class="form-block ">
							<label for="name">Họ tên*</label>
							<input type="text" id="name" name="name" class="form-control" placeholder="Họ tên" required>
						</div>
						<div class="form-block ">
							<label>Giới tính </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
										
						</div>

						<div class="form-block ">
							<label for="email">Email*</label>
							<input type="email" id="email" name="email" required placeholder="expample@gmail.com" class="form-control">
						</div>

						<div class="form-block ">
							<label for="password">Password*</label>
							<input type="password" id="password" name="password" required placeholder="***********" class="form-control">
						</div>

						<div class="form-block ">
							<label for="date">Ngày Sinh*</label>
							<input type="text" class="form-control datepicker" id="start_date" name="date_of_birth" data-date-format="{!! JS_DATE !!}" placeholder="dd-mm-yyyy">
						</div>

						<div class="form-block">
							<label for="address">Địa Chỉ Giao Hàng*</label>
							<input name="address" type="text" id="address" placeholder="Street Address" class="form-control" required >
						</div>
						
						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input name="phone" type="text" id="phone" class="form-control" required>
						</div>
						
						<div class="form-block">
							<label for="note">Ghi chú</label>
							<textarea id="notes" class="form-control" name="note"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									<!--  one item	 -->
										<div class="media">
											@foreach($cart_item as $cart)
											<img width="10%" src="source/image/product/{{$cart->options->img}}" alt="" class="pull-left">
											<div class="media-body">
												<div class="col-md-6 col-sm-6 ">
													<p class="color-orange font-large">{{$cart->name}}</p>
													<span class="color-gray your-order-info">Color: Red</span>
													<span class="color-gray your-order-info">Size: M</span>
													<span class="color-gray your-order-info">Qty: {{$cart->qty}}</span>
													<span class="color-gray your-order-info">{{number_format($cart->price,0)}} VND</span>
												</div>
												<div class="col-md-6 col-sm-6">
													{{($cart->qty)*($cart->price)}} VND
												</div>
											</div>
											@endforeach
										</div>
									<!-- end one item -->
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">{{Cart::Subtotal()}} VND</h5></div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn A
											<br>- Ngân hàng ACB, Chi nhánh TPHCM
										</div>						
									</li>
									
								</ul>
							</div>

							
							<div><button type="submit" class="btn-success center-block form-control" style="color: white; font-size: 18px">Đặt hàng</button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>


		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection

@section("script")
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="source/assets/front/js/checkout.js"></script>
@endsection