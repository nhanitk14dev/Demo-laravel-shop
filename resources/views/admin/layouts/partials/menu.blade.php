<style>
    .slimScrollDiv, .slimScrollDiv ul.list {
        min-height: calc(100vh - 220px);
    }
</style>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info" style="height: 100px;">
            <div class="info-container">
                <div class="image pull-left">
                    <img src="/assets/admin/images/user.png" width="48" height="48" alt="User"/>
                </div>
                <div class="name" data-toggle="dropdown" aria-haspopup="true"
                     aria-expanded="false">{{ Auth::user()->name }}</div>
                <div class="email">{{ Auth::user()->email }}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i
                                        class="material-icons">person</i>{!! trans("admin_menu.profile") !!}</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="material-icons">input</i>{!! trans("admin_menu.sign_out") !!}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header"></li>
                <li class="{!! currentPageMenu(["*admin/dashboard"]) !!}">
                    <a href="/admin/dashboard">
                        <i class="material-icons">dashboard</i>
                        <span>{!! trans("admin_menu.dashboard") !!}</span>
                    </a>
                </li>
                <li class="{!! currentPageMenu(["
                    *admin/products*",
                    "*admin/sizes*",
                    "*admin/colors*"
                    ]) !!}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">dns</i>
                        <span>{!! trans("admin_menu.products") !!}</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{!! currentPageMenu(["*admin/products"]) !!}">
                            <a href="{!! route("admin.product.index") !!}">
                                <span>{!! trans("admin_menu.products_list") !!}</span>
                            </a>
                        </li>
                        <li class="{!! currentPageMenu(["*admin/products/create"]) !!}">
                            <a href="{!! route("admin.product.create") !!}">
                                <span>{!! trans("admin_menu.create_product") !!}</span></a>
                        </li>
                        <li class="{!! currentPageMenu(["*admin/product-categories*"]) !!}">
                            <a href="{!! route("admin.product_category.index") !!}">
                                <span>{!! trans("admin_menu.categories") !!}</span>
                            </a>
                        </li>
                        <li class="{!! currentPageMenu(["*admin/sizes*"]) !!}">
                            <a href="{!! route("admin.size.index") !!}">
                                <span>{!! trans("admin_menu.sizes") !!}</span>
                            </a>
                        </li>

                        <li class="{!! currentPageMenu(["*admin/colors*"]) !!}">
                            <a href="{!! route("admin.color.index") !!}">
                                <span>{!! trans("admin_menu.colors") !!}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="header">{!! trans("admin_menu.system") !!}</li>


                <li class="{!! currentPageMenu(["*admin/users*", '*admin/roles*']) !!}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">account_box</i>
                        <span>{!! trans("admin_menu.users") !!}</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="{!! currentPageMenu(["*admin/users*"]) !!}">
                            <a href="{!! route("admin.user.index") !!}">
                                 <span>{!! trans("admin_menu.users") !!}</span>
                            </a>
                        </li>
                         
                        <li>
                            <a href="{!! route("admin.role.index") !!}">
                                <span>{!! trans("admin_menu.roles") !!}</span>
                            </a>
                        </li>   
                    </ul>
                </li>

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy;{!! date("Y") !!} <a href="javascript:void(0);">{!! trans("admin_menu.footer") !!}</a>
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->

    {{--@include("admin.layouts.partials.right_bar_setting")--}}
</section>