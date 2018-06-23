<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin | ShopCake</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield("meta")

    <!-- Favicon-->
    <link rel="icon" href="/assets/admin/favicon.ico" type="image/x-icon">


    @include("admin.layouts.partials.define")

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="/assets/admin/css/app.css" rel="stylesheet" />

    @yield("style")
</head>

<body class="theme-red">
    <!-- Page Loader -->
   <!--  <div class="page-loader-wrapper">
       <div class="loader">
           <div class="preloader">
               <div class="spinner-layer pl-red">
                   <div class="circle-clipper left">
                       <div class="circle"></div>
                   </div>
                   <div class="circle-clipper right">
                       <div class="circle"></div>
                   </div>
               </div>
           </div>
           <p>Please wait...</p>
       </div>
   </div> -->
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="/">ADMIN - SHOPCAKE</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    @include("admin.layouts.partials.menu")

    <section class="content">
        <div class="container-fluid">
            <!-- Breadcrumb::out() //SEO -->

            @yield("content")

        </div>
    </section>

    <script src="/assets/admin/js/app.js?v=1.0"></script>

    @yield("script")
</body>

</html>