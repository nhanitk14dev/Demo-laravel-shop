<?php $__env->startSection("meta"); ?>
    <!--for branch tab-->

    <link rel="stylesheet" href="/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.css"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("style"); ?>
    <!--select 2 plugin-->
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css"/>
    <!--for branch tab-->
    <link rel="stylesheet" href="/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"/>

    <style type="text/css">
        .dropdown-menu {
            margin-top: 350px;
        }
    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection("content"); ?>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">

                    <?php echo $__env->make("admin.layouts.partials.message", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php if(empty($product)): ?>
                        <form id="form-form" method="post" action="<?php echo route("admin.product.store"); ?>"
                              enctype="multipart/form-data">
                    <?php else: ?>
                        <form id="form-form" method="post" action="<?php echo route("admin.product.update", $product->id); ?>"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                    <?php endif; ?>

                        <?php echo e(csrf_field()); ?>

                    <?php echo $__env->make("admin.product.partials.tab", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="information">
                                <?php echo $__env->make("admin.product.partials.information", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>

                            <div role="tabpanel" class="tab-pane fade " id="detail">
                                <?php echo $__env->make("admin.product.partials.detail", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>

                            <div role="tabpanel" class="tab-pane fade " id="photos">
                                <?php echo $__env->make("admin.product.partials.photos", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="seo">
                                <?php echo $__env->make("admin.metadata.form", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>

                        </div>

                        
                        <?php echo $__env->make("admin.layouts.partials.form_buttons", [
                            "cancel" => route("admin.product.index")
                        ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>
    <?php echo $__env->make("admin.layouts.partials.upload_template", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!--select 2 plugin-->
    <script src="/assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

    <script src="/assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="/assets/plugins/jquery-validation/jquery.validate.js"></script>

    <script type="text/javascript" src="/assets/admin/js/pages/product.create.js?v=1.2"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.layouts.master", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>