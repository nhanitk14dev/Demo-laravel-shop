<div class="row">
    <div class="col-md-4">
        <div class="form-group form-float">
            <label class="form-label"><?php echo trans("admin_product.form.unit_price"); ?></label>
            <div class="form-line">
                <input type="text" class="form-control" name="unit_price"
                       value="<?php echo !empty($product) ? $product->unit_price : old("unit_price"); ?>">
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group form-float">
            <label class="form-label"><?php echo trans("admin_product.form.promotion_price"); ?></label>
            <div class="form-line">
                <input type="text" class="form-control" name="promotion_price"
                       value="<?php echo !empty($product) ? $product->promotion_price : old("promotion_price"); ?>">
            </div>
        </div>
    </div>

     <div class="col-md-4">
        <div class="form-group form-float">
            <label class="form-label"><?php echo trans("admin_product.form.rating"); ?></label>
            <div class="form-line">
                <input type="number" class="form-control" name="rating" min="0" max="5" 
                       value="<?php echo !empty($product) ? $product->rating : 0; ?>">
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <p><?php echo trans("admin_product.form.size"); ?></p>
        <div class="form-group form-float">
            <div class="form-line">
                <select name="size_id[]" id="size_id" class="form-control" multiple>
                    <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="">---</option>
                        <option value="<?php echo $size->id; ?> " <?php echo !empty($product) && in_array($size->id, $product_size) ? 'selected' : null; ?>><?php echo $size->name; ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <p><?php echo trans("admin_product.form.color"); ?></p>
        <div class="form-group form-float">
            <div class="form-line">
                <select name="color_id[]" id="color_id" class="form-control" multiple>
                    <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="">---</option>
                        <option value="<?php echo $color->id; ?>" <?php echo !empty($product) && in_array($color->id, $product_color) ? 'selected' : null; ?>><?php echo $color->name; ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <p><?php echo trans("admin_product.form.producer"); ?></p>
        <div class="form-group form-float">
            <div class="form-line">
                <select name="producer_id" class="form-control">
                    <option value="">---</option>
                    <?php if(!empty($producer)): ?>
                        <?php $__currentLoopData = $producers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo $producer->id; ?>" <?php echo !empty($product) && $product->producer_id ==  $producer->id ? "selected" : null; ?>>
                                <?php echo $producer->code; ?> / <?php echo $producer->name; ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <option value="">---Đang cập nhật---</option>
                    <?php endif; ?>

                </select>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group form-float">
            <label for="start_date"><?php echo trans('admin_product.form.start_date_promotion'); ?></label>
            <input type="text" class="form-control datepicker" id="start_date_promotion" name="start_date_promotion" data-date-format="<?php echo JS_DATE; ?>" placeholder="dd-mm-yyyy">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-float">
            <label for="end_date"><?php echo trans('admin_product.form.end_date_promotion'); ?></label>
            <input type="text" class="form-control datepicker" id="end_date_promotion" name="end_date_promotion" data-date-format="<?php echo JS_DATE; ?>" placeholder="dd-mm-yyyy">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-float">
            <label class="form-label"><?php echo trans("admin_product.form.unit"); ?></label>
            <div class="form-line">
                <input type="text" class="form-control" name="unit"
                       value="<?php echo !empty($product) ? $product->unit : old("unit"); ?>">
            </div>
        </div>
    </div>
</div>





