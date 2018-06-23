<ul class="nav nav-tabs tab-nav-right" role="tablist">
    @if(!empty($default_tabs))
        @foreach($default_tabs as $key => $value)
            <li role="presentation" class="{{ $key === 0 ? 'active': null }}">
                <a href="#{{ $value['id'] }}" data-toggle="tab" aria-expanded="false">
                    <span class="font-17">{{ $value['name'] }}</span>
                </a>
            </li>
        @endforeach
    @endif

    @foreach($composer_locales as $key => $locale)
        <li role="presentation" class="{{ empty($default_tabs) && $key === $composer_locale ? 'active' : null }}">
            <a href="#{{ !empty($tab_id) ? $tab_id : 'trans' }}_{{ $key }}" data-toggle="tab" aria-expanded="false">
                <span class="font-17">{!! trans("admin_translation.tab.{$key}") !!}</span>
            </a>
        </li>
    @endforeach
</ul>