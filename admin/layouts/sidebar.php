

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <ul class="sidebar-menu" data-widget="tree">
            <br>
            <li class="<?php echo(isset($open) && $open == 'dashboard' ? 'active' : '') ?>">
                <a href="<?php echo base_url() ?>admin/dashboard.php">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>


            <li class="treeview <?php echo(isset($open) && $open == 'slide' ? 'active' : '') ?>">
                <a href="#">
                    <i class="fa fa-sliders"></i>
                    <span>Quản lý slide</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo modules("slide/add.php") ?>"><i class="fa fa-circle-o"></i> Thêm mới
                            slide</a></li>
                    <li><a href="<?php echo modules("slide") ?>"><i class="fa fa-circle-o"></i> Danh sách slide</a></li>
                </ul>
            </li>

            <li class="treeview <?php echo(isset($open) && $open == 'category' ? 'active' : '') ?>">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>Quản lý danh mục</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo modules("category/add.php") ?>"><i class="fa fa-circle-o"></i> Thêm danh mục</a>
                    </li>
                    <li><a href="<?php echo modules("category") ?>"><i class="fa fa-circle-o"></i> Danh sách danh
                            mục</a></li>
                </ul>
            </li>


            <li class="treeview <?php echo(isset($open) && $open == 'product' ? 'active' : '') ?>">
                <a href="#">
                    <i class="fa fa-database"></i> <span>Quản lý sản phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo modules("product/add.php") ?>"><i class="fa fa-circle-o"></i> Thêm sản phẩm</a>
                    </li>
                    <li><a href="<?php echo modules("product") ?>"><i class="fa fa-circle-o"></i> Danh sách sản phẩm</a>
                    </li>
                </ul>
            </li>

            <li class="<?php echo(isset($open) && $open == 'order' ? 'active' : '') ?>">
                <a href="<?php echo modules("order") ?>">
                    <i class="fa fa-first-order"></i><span>Quản lý đơn hàng</span>

                </a>
            </li>
            
              <li class="treeview <?php echo(isset($open) && $open == 'news' ? 'active' : '') ?>">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Quản lý bài viết</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo modules("news/add.php") ?>"><i class="fa fa-circle-o"></i> Thêm bài viết</a>
                    </li>
                    <li><a href="<?php echo modules("news") ?>"><i class="fa fa-circle-o"></i> Danh sách bài viết</a>
                    </li>
                </ul>
            </li>

            <li class="treeview <?php echo(isset($open) && $open == 'admin' ? 'active' : '') ?>">
                <a href="#">
                    <i class="fa fa-user"></i><span>Quản lý Nhân viên</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo modules("admin/add.php") ?>"><i class="fa fa-circle-o"></i> Thêm mới</a>
                    </li>
                    <li><a href="<?php echo modules("admin") ?>"><i class="fa fa-circle-o"></i> Danh sách </a>
                    </li>
                </ul>
            </li>

            <li class="<?php echo(isset($open) && $open == 'user' ? 'active' : '') ?>">
                <a href="<?php echo modules("user") ?>">
                    <i class="fa fa-user"></i><span>Quản Lý Thành viên</span>

                </a>
            </li>

            <li>
                <a>
                    <i class="fa fa-calendar"></i> <span>Lịch</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-yellow"><?php echo date("Y") ?></small>

                        <small class="label pull-right bg-red"><?php echo date("m") ?></small>
                        <small class="label pull-right bg-blue"><?php echo date("d") ?></small>
                    </span>
                </a>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
