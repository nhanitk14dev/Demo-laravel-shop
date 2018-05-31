@php $route_translation = TranslateUrl::$locales; @endphp
@if(count($route_translation))
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <span >
            <a title="{{ trans("f_top.{$localeCode}") }}" rel="alternate" hreflang="{{ $localeCode }}" class="{!! \App::getLocale() == $localeCode ? "active" : null !!}" href="{!! $route_translation[$localeCode] !!}">
                <img src="/assets/themes/images/icon--lang-{{ $localeCode }}.png" alt="{{ $properties['native'] }}" />
            </a>
        </span>
    @endforeach
@else
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <span >
            <a title="{{ trans("f_top.{$localeCode}") }}" rel="alternate" hreflang="{{ $localeCode }}" class="{!! \App::getLocale() == $localeCode ? "active" : null !!}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                <img src="/assets/themes/images/icon--lang-{{ $localeCode }}.png" alt="{{ $properties['native'] }}" />
            </a>
        </span>
    @endforeach
@endif