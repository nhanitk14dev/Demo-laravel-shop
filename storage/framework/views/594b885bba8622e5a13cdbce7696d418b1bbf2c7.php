<?php $__env->startSection('content'); ?>

<?php echo $__env->make('frontend.layouts.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<style type="text/css" id="enject"></style>
	<div id="mainBody">
		<div class="container">
			<div class="row">
				<!-- Sidebar ================================================== -->
				<?php echo $__env->make('frontend.layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<!-- Sidebar end=============================================== -->
				<div class="span9">		
					<div class="well well-small">
						<h4>Sản Phẩm Mới<small class="pull-right">200+ sản phẩm mới</small></h4>
						<div class="row-fluid">
							<div id="featured" class="carousel slide">
								<div class="carousel-inner">
									<!-- start-item-list -->
									<div class="item active">
										<ul class="thumbnails">
											<?php $__currentLoopData = $product_new; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<li class="span3">
													<div class="thumbnail">
														<i class="tag"></i>
														<a href="<?php echo e(route('front.product.show')); ?>">
															<img src="<?php echo e($new->photo_path_medium); ?>" alt="">
														</a>
														<div class="caption">
															<h5><?php echo $new->name; ?></h5>
															<h4><a class="btn" href="<?php echo e(route('front.product.show')); ?>"><i class="icon-zoom-in"></i></a> <span class="pull-right"><?php echo $new->unit_price; ?> vnd</span></h4>
														</div>
													</div>
													
												</li>
												<?php if($key===3) break; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</ul>
									</div>
									<div class="item">
										<ul class="thumbnails">
											<?php $__currentLoopData = $product_new; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

												<?php if($key<=3) continue; ?> <!-- đã giới hạn lấy 8 nên loại nhỏ hơn 3 -->

												<li class="span3">
													<div class="thumbnail">
														<i class="tag"></i>
														<a href="" alt="">
															<img src="<?php echo e($new->photo_path_medium); ?>" alt="">
														</a>
														<div class="caption">
															<h5><?php echo $new->name; ?></h5>
															<h4><a class="btn" href="<?php echo e(route('front.product.show')); ?>"><i class="icon-zoom-in"></i></a> <span class="pull-right"><?php echo $new->unit_price; ?> vnd</span></h4>
														</div>
													</div>
												</li>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</ul>
									</div>
									<!-- end-item-list -->
								</div>
								<a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
								<a class="right carousel-control" href="#featured" data-slide="next">›</a>
							</div>
						</div>
					</div>
					<h4>Các sản phẩm liên quan</h4>
					<ul class="thumbnails">
						<?php $__currentLoopData = $product_other; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $other): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li class="span3">
								<div class="thumbnail">
									<a  href="<?php echo e(route('front.product.show')); ?>">
										<img src="<?php echo e($other->photo_path_medium); ?>" alt=""/>
									</a>
									<div class="caption">
										<h5><?php echo $other->name; ?></h5>
										<p> 
											<?php echo $other->remark; ?>

										</p>
										<h4 style="text-align:center"><a class="btn" href="<?php echo e(route('front.product.show')); ?>"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Thêm vào giỏ hàng<i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#"><?php echo $other->unit_price; ?> vnđ</a></h4>
									</div>
								</div>
							</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>