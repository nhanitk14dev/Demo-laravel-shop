<div id="fb-root"></div>
<div class="fb-wrap" style="position:fixed; width:250px; height: 320px; ">
    <div class="fb-page"
         data-adapt-container-width="true"
         data-height="320"
         data-hide-cover="false"
         data-href="https://www.facebook.com/www.prime.vn"
         data-show-facepile="true"
         data-show-posts="false"
         data-small-header="false"
         data-tabs="messages"
         data-width="280">
    </div>
</div>
<div class="fb-chat-live">
    <p><i class="icon_chat_alt"></i> <a>{{ trans('f_layout.support_from_prime') }}</a></p>
</div>
<script>
    $(document).ready(function () {
        var fbButton = $('.fb-chat-live'),
            fbWrap = $(".fb-wrap");

            fbButton.bind('click', function(){
                var el = $(this);
                    el.toggleClass('active');
                    fbWrap.toggleClass('active');
                    $('.subscribable').removeClass('active');
            });
    });

    if(navigator.userAgent.indexOf("Speed Insights") == -1) {
        $(function (d, s, id) {
            const locale = 'vi';
            var fb_lang = locale == 'vi' ? 'vi_VN' : 'en_US';
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/" + fb_lang + "/sdk.js#xfbml=1&version=v2.10&&appId=126586364523772";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, "script", "facebook-jssdk"));
    }

</script>