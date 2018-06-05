<?php  $route_translation = TranslateUrl::$locales;  ?>
<?php if(count($route_translation)): ?>
    <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span >
            <a title="<?php echo e(trans("f_top.{$localeCode}")); ?>" rel="alternate" hreflang="<?php echo e($localeCode); ?>" class="<?php echo \App::getLocale() == $localeCode ? "active" : null; ?>" href="<?php echo $route_translation[$localeCode]; ?>">
                <img src="/assets/themes/images/icon--lang-<?php echo e($localeCode); ?>.png" alt="<?php echo e($properties['native']); ?>" />
            </a>
        </span>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span >
            <a title="<?php echo e(trans("f_top.{$localeCode}")); ?>" rel="alternate" hreflang="<?php echo e($localeCode); ?>" class="<?php echo \App::getLocale() == $localeCode ? "active" : null; ?>" href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>">
                <img src="/assets/themes/images/icon--lang-<?php echo e($localeCode); ?>.png" alt="<?php echo e($properties['native']); ?>" />
            </a>
        </span>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>