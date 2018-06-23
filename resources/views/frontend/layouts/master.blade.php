<!DOCTYPE html>
<html lang="{{ $composer_locale }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Nhanitk14-Shop2 | {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="favicon.ico">


    <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"> -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Global styles START -->
    <link href="/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Global styles END -->

    <!-- Page level plugin styles START -->
    <link href="/assets/themes/pages/css/animate.css" rel="stylesheet">
    <link href="/assets/themes/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <link href="/assets/themes/plugins/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
    <!-- Page level plugin styles END -->

    <!-- Theme styles START -->
    <link href="/assets/themes/pages/css/components.css" rel="stylesheet">
    <link href="/assets/themes/pages/css/slider.css" rel="stylesheet">
    <link href="/assets/themes/pages/css/style-shop.css" rel="stylesheet" type="text/css">
    <link href="/assets/themes/corporate/css/style.css" rel="stylesheet">
    <link href="/assets/themes/corporate/css/style-responsive.css" rel="stylesheet">
    <link href="/assets/themes/corporate/css/themes/red.css" rel="stylesheet" id="style-color">
    <link href="/assets/themes/corporate/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->
    @yield("meta")

    @yield("style")
</head>

    @include("frontend.layouts.partials.header")

    <body class="ecommerce">

    @yield("content")

    @include("frontend.layouts.partials.footer")


    <script src="/assets/themes/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/themes/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="/assets/themes/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets/themes/corporate/scripts/back-to-top.js" type="text/javascript"></script>
    <script src="/assets/themes/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="/assets/frontend/js/cart.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="/assets/themes/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="/assets/themes/plugins/owl.carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
    <script src='/assets/themes/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->
    <script src="/assets/themes/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->

    <script src="/assets/themes/corporate/scripts/layout.js" type="text/javascript"></script>
    <script src="/assets/themes/pages/scripts/bs-carousel.js" type="text/javascript"></script>

    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initOWL();
            Layout.initImageZoom();
            Layout.initTouchspin();
            Layout.initTwitter();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->

    <script>
        window.onscroll = function() {myFunction()};

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction() {
          if (window.pageYOffset >= sticky) {
            header.classList.add("sticky");
          } else {
            header.classList.remove("sticky");
          }
        }
    </script>

@stack("add_script")

@yield("script")
</body>
</html>
