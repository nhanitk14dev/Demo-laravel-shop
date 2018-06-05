<script>
    window.google_map_key = '<?php echo config('services.google.map_key'); ?>';
    window.laravel_token = '<?php echo csrf_token(); ?>';
    const MAX_IMAGE_UPLOAD_SIZE = <?php echo MAX_IMAGE_UPLOAD_SIZE; ?>; //KB
    const MAX_FILE_UPLOAD_SIZE = <?php echo MAX_FILE_UPLOAD_SIZE; ?>; //KB
    const IMAGE_TYPE_ACCEPT = '<?php echo IMAGE_TYPE_ACCEPT; ?>'; //KB
    const COMPOSER_LOCALE = '<?php echo $composer_locale; ?>'; //KB
</script>