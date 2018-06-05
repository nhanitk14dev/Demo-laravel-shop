<?php $__env->startSection("meta"); ?>
    <meta name="linkDatatable" content="<?php echo e(route('admin.product.datatable')); ?>"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("style"); ?>
    <!--dataTables plugin-->
    <link rel="stylesheet" href="/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"/>
<?php $__env->stopSection(); ?>


<?php $__env->startSection("content"); ?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <a href="<?php echo route("admin.product.create"); ?>" class="btn btn-info waves-effect pull-right">
                    <i class="material-icons">add</i>
                    <span><?php echo trans("button.create"); ?></span>
                </a>
                <h2>
                    <?php echo trans("admin_product.list"); ?>

                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="body">

                <div class="row hidden">
                    <div class="col-sm-7 hidden-xs"></div>
                    <div class="col-xs-10 col-sm-4">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" id="code" placeholder="<?php echo e(trans('admin_product.form.code')); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-2 col-sm-1">
                        <button type="button" class="btn btn-primary" id="btn_search"><?php echo e(trans('button.search')); ?></button>
                    </div>
                </div>

                <?php echo $__env->make("admin.layouts.partials.message", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <table id="datatable" class="table table-bordered table-striped table-hover dataTable" style="width: 100%">
                    <thead>
                    <tr>
                        <th width="40"><?php echo trans("admin_product.table.id"); ?></th>
                        <th><?php echo trans("admin_product.table.name"); ?></th>
                        <th><?php echo trans("admin_product.table.image"); ?></th>
                        <th width="150"><?php echo trans("admin_product.table.action"); ?></th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>
    <?php echo $__env->make("admin.layouts.partials.modal-delete", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!--dataTables plugin-->
    <script src="/assets/plugins/jquery-datatable/jquery.dataTables.js" type="text/javascript"></script>
    <script src="/assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js" type="text/javascript"></script>


    <script type="text/javascript" src="/assets/admin/js/pages/product.index.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.layouts.master", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>