@php $route_translation = TranslateUrl::$locales; @endphp
@if(count($route_translation))
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li class="top__item lang">
            <a title="{{ trans("f_top.{$localeCode}") }}" rel="alternate" hreflang="{{ $localeCode }}" class="{!! \App::getLocale() == $localeCode ? "active" : null !!}" href="{!! $route_translation[$localeCode] !!}">
                <img src="/assets/images/icon/icon--lang-{{ $localeCode }}.png" alt="{{ $properties['native'] }}" />
            </a>
        </li>
    @endforeach
@else
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li class="top__item lang">
            <a title="{{ trans("f_top.{$localeCode}") }}" rel="alternate" hreflang="{{ $localeCode }}" class="{!! \App::getLocale() == $localeCode ? "active" : null !!}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                <img src="/assets/images/icon/icon--lang-{{ $localeCode }}.png" alt="{{ $properties['native'] }}" />
            </a>
        </li>
    @endforeach
@endif