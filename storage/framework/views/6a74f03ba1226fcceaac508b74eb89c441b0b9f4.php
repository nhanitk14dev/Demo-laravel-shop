<?php  $locales = config("laravellocalization.supportedLocales");  ?>

<?php $__currentLoopData = $locales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-6">
        <h2 class="card-inside-title"><?php echo $value["name"]; ?></h2>

        <?php $__currentLoopData = $form_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($field["type"] === "text"): ?>
                <div class="form-group form-float">
                    <div class="form-line">
                        <input type="text" id="<?php echo "{$key}_{$field["name"]}"; ?>" class="form-control noEnterSubmit" name="<?php echo $key; ?>[<?php echo $field["name"]; ?>]" value="<?php echo !empty($object_trans) ? $object_trans->{"{$field['name']}:{$key}"} : old("{$key}.{$field["name"]}"); ?>">
                        <label class="form-label"><?php echo trans("{$translation_file}.form.{$field["name"]}"); ?></label>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>