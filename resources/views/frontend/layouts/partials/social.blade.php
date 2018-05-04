<a href="https://www.facebook.com/sharer/sharer.php?u={!! !empty($link) ? urlencode($link) :  urlencode(Request::fullUrl()) !!}&t={!! urlencode($title) !!}"
   title="Share on Facebook" target="_blank"
   onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={!! !empty($link) ? urlencode($link) : urlencode(Request::fullUrl())  !!}&t={!! urlencode($title) !!}'); return false;"><i
            class="social_facebook"></i></a>

<a href="https://twitter.com/intent/tweet?source={!! !empty($link) ? urlencode($link) :  urlencode(Request::fullUrl()) !!}&text={!! urlencode($title) !!}"
        target="_blank" title="Tweet"
        onclick="window.open('https://twitter.com/intent/tweet?text={!! urlencode($title) !!}:%20{!! !empty($link) ? urlencode($link) :  urlencode(Request::fullUrl()) !!}'); return false;"><i class="social_twitter"></i></a>

{{--<a href="#"><i class="social_instagram"></i></a>--}}

<a href="mailto:?subject={!! urlencode($title) !!}&body={!! urlencode($title) !!}:%20{!! !empty($link) ? urlencode($link) :  urlencode(Request::fullUrl()) !!}"
   target="_blank" title="Email"
   onclick="window.open('mailto:?subject={!! urlencode($title) !!}&body={!! !empty($link) ? urlencode($link) :  urlencode(Request::fullUrl()) !!}'); return false;"><i class="icon_mail"></i></a>