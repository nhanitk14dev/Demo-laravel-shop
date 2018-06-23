<script>
    window.google_map_key = '{!! config('services.google.map_key') !!}';
    window.laravel_token = '{!! csrf_token() !!}';
    const MAX_IMAGE_UPLOAD_SIZE = {!! MAX_IMAGE_UPLOAD_SIZE !!}; //KB
    const MAX_FILE_UPLOAD_SIZE = {!! MAX_FILE_UPLOAD_SIZE !!}; //KB
    const IMAGE_TYPE_ACCEPT = '{!! IMAGE_TYPE_ACCEPT !!}'; //KB
    const COMPOSER_LOCALE = '{!! $composer_locale !!}'; //KB
    const COMPOSER_LOCALE = '{{ $composer_locale }}';
    const COMPOSER_LOCALES = @json($composer_locales);
    const LOCALES_REQUIRE = @json(LOCALES_REQUIRE);
</script>
