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
                     aria-expanded="false"><?php echo e(Auth::user()->name); ?></div>
                <div class="email"><?php echo e(Auth::user()->email); ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i
                                        class="material-icons">person</i><?php echo trans("admin_menu.profile"); ?></a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="material-icons">input</i><?php echo trans("admin_menu.sign_out"); ?></a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo e(csrf_field()); ?>

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
                <li class="<?php echo currentPageMenu(["*admin/dashboard"]); ?>">
                    <a href="/admin/dashboard">
                        <i class="material-icons">dashboard</i>
                        <span><?php echo trans("admin_menu.dashboard"); ?></span>
                    </a>
                </li>
                <li class="<?php echo currentPageMenu(["
                    *admin/products*",
                    "*admin/sizes*",
                    "*admin/colors*"
                    ]); ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">dns</i>
                        <span><?php echo trans("admin_menu.products"); ?></span>
                    </a>
                    <ul class="ml-menu">
                        <li class="<?php echo currentPageMenu(["*admin/products"]); ?>">
                            <a href="<?php echo route("admin.product.index"); ?>">
                                <span><?php echo trans("admin_menu.products_list"); ?></span>
                            </a>
                        </li>
                        <li class="<?php echo currentPageMenu(["*admin/products/create"]); ?>">
                            <a href="<?php echo route("admin.product.create"); ?>">
                                <span><?php echo trans("admin_menu.create_product"); ?></span></a>
                        </li>
                        <li class="<?php echo currentPageMenu(["*admin/product-categories*"]); ?>">
                            <a href="<?php echo route("admin.product_category.index"); ?>">
                                <span><?php echo trans("admin_menu.categories"); ?></span>
                            </a>
                        </li>
                        <li class="<?php echo currentPageMenu(["*admin/sizes*"]); ?>">
                            <a href="<?php echo route("admin.size.index"); ?>">
                                <span><?php echo trans("admin_menu.sizes"); ?></span>
                            </a>
                        </li>

                        <li class="<?php echo currentPageMenu(["*admin/colors*"]); ?>">
                            <a href="<?php echo route("admin.color.index"); ?>">
                                <span><?php echo trans("admin_menu.colors"); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="header"><?php echo trans("admin_menu.system"); ?></li>


                <li class="<?php echo currentPageMenu(["*admin/users*", '*admin/roles*']); ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">account_box</i>
                        <span><?php echo trans("admin_menu.users"); ?></span>
                    </a>
                    <ul class="ml-menu">
                        <li class="<?php echo currentPageMenu(["*admin/users*"]); ?>">
                            <a href="<?php echo route("admin.user.index"); ?>">
                                 <span><?php echo trans("admin_menu.users"); ?></span>
                            </a>
                        </li>
                         
                        <li>
                            <a href="<?php echo route("admin.role.index"); ?>">
                                <span><?php echo trans("admin_menu.roles"); ?></span>
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
                &copy;<?php echo date("Y"); ?> <a href="javascript:void(0);"><?php echo trans("admin_menu.footer"); ?></a>
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->

    
</section>