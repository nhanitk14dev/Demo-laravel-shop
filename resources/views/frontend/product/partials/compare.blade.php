@extends('frontend.layouts.master')

@section('content')

<div id="mainBody">
	<div class="container">
		<div class="row">
			@include('frontend.layouts.sidebar')
			<div class="span9">
				<ul class="breadcrumb">
					<li><a href="index.html">Home</a> <span class="divider">/</span></li>
					<li class="active">Products Compairsition</li>
				</ul>
				<h3> Products Compairsition <small class="pull-right"> 2 products are compaired </small></h3>	
				<hr class="soft"/>

				<table id="compairTbl" class="table table-bordered">
					<thead>
						<tr>
							<th>Features</th>
							<th>Product1 name here </th>
							<th>Product2 name here</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>&nbsp;</td>
							<td style="text-align:center">
								<p class="justify">
									Nowadays the lingerie industry is one of the most successful business spheres.
									We always stay in touch with the latest fashion tendencies - that is why our 
									goods are so popular and we have a great number of faithful customers all over the country.
								</p>
								<img src="/assets/themes/images/products/1.jpg" alt=""/>
								<form class="form-horizontal qtyFrm">
									<h3> $222.00</h3><br/>
									<a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
									<a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
								</form>
							</td>
							<td>
								<p class="justify">
									Nowadays the lingerie industry is one of the most successful business spheres.
									We always stay in touch with the latest fashion tendencies - that is why our 
									goods are so popular and we have a great number of faithful customers all over the country.
								</p>
								<img src="/assets/themes/images/products/3.jpg" alt=""/>

								<form class="form-horizontal qtyFrm">
									<h3> $190.00</h3>
									<br/>
									<a href="product_details.html" class="btn btn-large btn-primary"> Add to <i class=" icon-shopping-cart"></i></a>
									<a href="product_details.html" class="btn btn-large"><i class="icon-zoom-in"></i></a>
								</form>
							</td>
						</tr>
						<tr>
							<td>Height</td>
							<td>2"</td>
							<td>2"</td>
						</tr>
						<tr>
							<td>Deepth</td>
							<td>5"</td>
							<td>5"</td>
						</tr>
						<tr>
							<td>Dimension</td>
							<td>--</td>
							<td>--</td>
						</tr>
						<tr>
							<td>Width</td>
							<td>6.5"</td>
							<td>6.5"</td>
						</tr>
						<tr>
							<td>Weight</td>
							<td>0.5kg</td>
							<td>0.5kg</td>
						</tr>
					</tbody>
				</table>		
				<a href="{{route('front.product.index')}}" class="btn btn-large pull-right">Back Products Page</a>


			</div>
		</div>
	</div>
</div>
<!-- MainBody End ============================= -->

@endsection