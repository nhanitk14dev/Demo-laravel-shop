@extends('frontend.layouts.master')

@section('content')

<div id="mainBody">
	<div class="container">
		<div class="row">
			<!-- Sidebar ================================================== -->
			@include('frontend.layouts.sidebar')
			<!-- Sidebar end=============================================== -->
			<!--content pull right-->
			<div class="span9">
				<ul class="breadcrumb">
					<li><a href="/">Home</a> <span class="divider">/</span></li>
					<li class="active">Products Name</li>
				</ul>
				<h3> Products Name <small class="pull-right"> 40 products are available </small></h3>	
				<hr class="soft"/>
				<p>
					Nowadays the lingerie industry is one of the most successful business spheres.We always stay in touch with the latest fashion tendencies - that is why our goods are so popular and we have a great number of faithful customers all over the country.
				</p>
				<hr class="soft"/>
				<form class="form-horizontal span6">
					<div class="control-group">
						<label class="control-label alignL">Sort By </label>
						<select>
							<option>Priduct name A - Z</option>
							<option>Priduct name Z - A</option>
							<option>Priduct Stoke</option>
							<option>Price Lowest first</option>
						</select>
					</div>
				</form>

				<div id="myTab" class="pull-right">
					<a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
					<a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
				</div>
				<br class="clr"/>
				<div class="tab-content">
					<div class="tab-pane" id="listView">
						@foreach($products as $product)
							<div class="row">	  
								<div class="span2">
									<img src="{{ $product->photo_path_medium }}" alt=""/>
								</div>
								<div class="span4">
									<h3>New | Available</h3>				
									<hr class="soft"/>
									<h5>{!! $product->name !!}</h5>
									<p>
										{!! $product->remark !!}
									</p>
									<a class="btn btn-small pull-right" href="{{route('front.product.show')}}">View Details</a>
									<br class="clr"/>
								</div>
								<div class="span3 alignR">
									<form class="form-horizontal qtyFrm">
										<h3> {!! $product->unit_price !!} đ</h3>
										<label class="checkbox">
											<input type="checkbox">  Adds product to compair
										</label><br/>

										<a href="{{route('front.product.show')}}" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
										<a href="{{route('front.product.show')}}" class="btn btn-large"><i class="icon-zoom-in"></i></a>

									</form>
								</div>
							</div>
							<hr class="soft"/>
						@endforeach
					</div>

					<div class="tab-pane active" id="blockView">
						<ul class="thumbnails"> <!-- hien thi dang o vuong -->
							@foreach($products as $product)
								<li class="span3">
									<div class="thumbnail">
										<a href="{{route('front.product.show')}}">
											<img src="{{ $product->photo_path_medium }}" alt=""/>
										</a>
										<div class="caption">
											<h5>{!! $product->name !!}</h5>
											<p> 
												{!! $product->remark !!}
											</p>
											{{ dd(route('front.product.show', $product->slug))}}
											<h4 style="text-align:center"><a class="btn" href="{{route('front.product.show', $product->slug)}}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">{!! $product->unit_price !!} đ</a></h4>
										</div>
									</div>
								</li>
							@endforeach
						</ul>
						<hr class="soft"/>
					</div>
				</div>

				<a href="{{route('front.compare')}}" class="btn btn-large pull-right">Compair Product</a>
				<div class="pagination">
					{{ $products->links() }}
				</div>
				<br class="clr"/>
			</div>
		</div>
	</div>
			<!--end content pull right-->
		</div>
	</div>
</div>

@endsection