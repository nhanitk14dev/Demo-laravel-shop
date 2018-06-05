<ul id="sortable-photos" class="list-photos">
    <?php if(!empty($product)): ?>
        <?php $__currentLoopData = $product->_photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li data-id="<?php echo e($rs->id); ?>">
                <div class="box-image">
                    <img src="<?php echo e($rs->arrayPath(true)['medium']); ?>" alt="<?php echo e($product->name); ?>">
                    <button type="button"
                            class="btn_delete_this"
                            data-parent ="li"
                            data-multi="1"
                            data-name="delete_photos[]"
                            data-value="<?php echo e($rs->id); ?>">
                        <i class="glyphicon glyphicon-remove"></i>
                    </button>
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</ul>
<div class="clearfix"></div>
<div class="multi-upload">
    <div class="box-upload">
        <label for="select-photos" class="label-select-images">
            <span class="glyphicon glyphicon-picture"></span>
        </label>
        <input type="file"
               multiple
               id="select-photos"
               data-append="#sortable-photos"
               data-name="photos[]"
               data-template="#photos-template"
               data-callback="callbackHandlePhotos"
               class="dz_select_photos"
               accept="image/*">
    </div>
</div>