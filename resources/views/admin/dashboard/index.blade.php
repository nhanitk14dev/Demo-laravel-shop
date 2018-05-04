@extends("admin.layouts.master")

@section("meta")

@endsection

@section("style")
    <style>
        a.info-box {
            cursor: pointer;
        }

        a.info-box:hover, a.info-box:focus {
            text-decoration: none !important;
            outline: none;
        !important;
        }
    </style>
@endsection

@section("content")
    <div class="row clearfix">
        @if(in_array('admin.news.index', $composer_auth_permissions))
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="{!! route("admin.news.index") !!}" class="info-box hover-expand-effect">
                    <div class="icon bg-pink">
                        <i class="material-icons">content_copy</i>
                    </div>
                    <div class="content">
                        <div class="text">{!! trans("admin_menu.news") !!}</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15"
                             data-fresh-interval="20">{{ $count_news }}</div>
                    </div>
                </a>
            </div>
        @endif

        @if(in_array('admin.company.index', $composer_auth_permissions))
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="{!! route("admin.company.index") !!}" class="info-box  hover-expand-effect">
                    <div class="icon bg-cyan">
                        <i class="material-icons">location_city</i>
                    </div>
                    <div class="content">
                        <div class="text">{!! trans("admin_menu.companies") !!}</div>
                        <div class="number count-to" data-from="0" data-to="257" data-speed="1000"
                             data-fresh-interval="20">{{ $count_company }}</div>
                    </div>
                </a>
            </div>
        @endif

        @if(in_array('admin.shareholder.index', $composer_auth_permissions))
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="{!! route("admin.user_company.index") !!}" class="info-box hover-expand-effect">
                    <div class="icon bg-light-green ">
                        <i class="material-icons">group_add</i>
                    </div>
                    <div class="content">
                        <div class="text">{!! trans("admin_menu.shareholders") !!}</div>
                        <div class="number count-to" data-from="0" data-to="243" data-speed="1000"
                             data-fresh-interval="20">{{ $count_user_company }}</div>
                    </div>
                </a>
            </div>
        @endif

        @if(in_array('admin.report.index', $composer_auth_permissions))
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="{!! route("admin.report.index") !!}" class="info-box  hover-expand-effect">
                    <div class="icon bg-blue-grey">
                        <i class="material-icons">report</i>
                    </div>
                    <div class="content">
                        <div class="text">{!! trans("admin_menu.reports") !!}</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15"
                             data-fresh-interval="20">{{ $count_report }}</div>
                    </div>
                </a>
            </div>
        @endif

        @if(in_array('admin.user.index', $composer_auth_permissions))
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="{!! route("admin.user.index") !!}" class="info-box  hover-expand-effect">
                    <div class="icon bg-light-blue">
                        <i class="material-icons">account_box</i>
                    </div>
                    <div class="content">
                        <div class="text">{!! trans("admin_menu.users") !!}</div>
                        <div class="number count-to" data-from="0" data-to="243" data-speed="1000"
                             data-fresh-interval="20">{{ $count_user }}</div>
                    </div>
                </a>
            </div>
        @endif

        @if(in_array('admin.system.edit', $composer_auth_permissions))
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a href="{!! route("admin.system.edit", 'dalathasfarm') !!}" class="info-box hover-expand-effect">
                    <div class="icon bg-orange ">
                        <i class="material-icons">settings</i>
                    </div>
                    <div class="content">
                        <div class="text">{!! trans("admin_menu.system") !!}</div>
                    </div>
                </a>
            </div>
        @endif
    </div>
@endsection

@section("script")
@endsection