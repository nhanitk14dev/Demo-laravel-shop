<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shop1 All Categories</title>
	<base href="{{asset('')}}">

	<link id="callCss" rel="stylesheet" href="/assets/themes/bootshop/bootstrap.min.css" media="screen"/>
	<link href="/assets/themes/css/base.css" rel="stylesheet" media="screen"/>
	<!-- Bootstrap style responsive -->	
	<link href="/assets/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="/assets/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
	<!-- Google-code-prettify -->	
	<link href="/assets/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
	<!-- fav and touch icons -->
	<link rel="shortcut icon" href="/assets/themes/images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/themes/images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/themes/images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/themes/images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="/assets/themes/images/ico/apple-touch-icon-57-precomposed.png">

	<link rel="stylesheet" href="/assets/themes/switch/themeswitch.css" type="text/css" media="screen" />
	
	@yield("style")
</head>
<body>

	@include('frontend.layouts.header')
	
	@yield('content')
	
	@include('frontend.layouts.footer')
	
	<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="/assets/themes/js/jquery.js" type="text/javascript"></script>
	<script src="/assets/themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/assets/themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="/assets/themes/js/bootshop.js"></script>
	<script src="/assets/themes/js/jquery.lightbox-0.5.js"></script>

	<script src="/assets/themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>

	@yield('script')
</body>
</html>
