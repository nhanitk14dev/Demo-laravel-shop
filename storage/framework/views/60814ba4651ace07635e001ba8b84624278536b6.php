<div id="header">
	<div class="container">
		<div id="welcomeLine" class="row">
			<div class="span6"><?php echo e(trans('f_menu.hi')); ?><strong> <?php echo e(trans('f_menu.name')); ?></strong></div>
			<div class="span6">
				<div class="pull-right">
					<?php echo $__env->make('frontend.layouts.partials.route_translation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<a href="product_summary.html"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ 3 ] <?php echo e(trans('f_menu.products')); ?></span> </a> 
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
						<?php $__currentLoopData = $composer_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($category->id); ?>"><?php echo $category->name; ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select> 
					<button type="submit" id="submitButton" class="btn btn-primary">Go</button>
				</form>
				<ul id="topMenu" class="nav pull-right">
					<li class="">
						<a href="<?php echo e(route('front.product.index')); ?>"><?php echo e(trans('f_menu.products')); ?></a>
						<!-- <ul>
							<li>aaaaa</li>
							<li>aaaaa</li>
							<li>aaaaa</li>
							<li>aaaaa</li>
						</ul> -->
					</li>
					<li class=""><a href="<?php echo e(route('front.about')); ?>"><?php echo e(trans('f_menu.about_us')); ?></a></li>
					<li class=""><a href="<?php echo e(route('front.contact')); ?>"><?php echo e(trans('f_menu.contact_us')); ?></a></li>
					<li class=""><a href="<?php echo e(route('front.faq')); ?>">FAQ</a></li>
					<li class="">
						<a href="#login" role="button" data-toggle="modal" ><span class="btn btn-large btn-success"><?php echo e(trans('f_top.login')); ?></span></a>
						<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h3><?php echo e(trans('f_top.login')); ?></h3>
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
											<input type="checkbox"> <?php echo e(trans('f_top.remember')); ?>

										</label>
									</div>
								</form>		
								<button type="submit" class="btn btn-success"><?php echo e(trans('f_top.login')); ?></button>
								<button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo e(trans('f_top.close')); ?></button>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- Header End====================================================================== -->