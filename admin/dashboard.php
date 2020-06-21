<?php
$open = "dashboard";
require "autoload/autoload.php";

require "layouts/head.php";
?>
<?php
$db = new Database();


?>
    <body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <?php require "layouts/header.php" ?>
    <!-- =============================================== -->
    <!-- Left side column. contains the sidebar -->
    <?php require "layouts/sidebar.php" ?>
    <!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Chào mừng bạn đến trang quản trị

            </h1>
            <ol class="breadcrumb">

                <li class="active">Dashboard</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="fa fa-th"></i></span>

                                <div class="info-box-content">
                                    <a href="<?php base_url() ?>modules/category">
                                        <span class="info-box-text">Danh mục</span>
                                        <?php $total_cate = $db->countTable('categories')?>
                                        <span class="info-box-number"><?= $total_cate ?></span>
                                    </a>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-red"><i class="fa fa-product-hunt"></i></span>

                                <div class="info-box-content">
                                    <a href="<?php base_url() ?>modules/product">
                                        <span class="info-box-text">Sản phẩm</span>
                                        <?php $total_pro = $db->countTable('products')?>
                                        <span class="info-box-number"><?= $total_pro ?></span>
                                    </a>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                                <div class="info-box-content">
                                    <a href="<?php base_url() ?>modules/order">
                                        <span class="info-box-text">Đơn hàng</span>
                                        <?php $total_order = $db->countTable('orders')?>
                                        <span class="info-box-number"><?= $total_order ?></span>
                                    </a>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                                <div class="info-box-content">
                                    <a href="<?php base_url() ?>modules/user">
                                        <span class="info-box-text">THành viên</span>
                                        <?php $total_customers = $db->countTable('customers')?>

                                        <span class="info-box-number"><?= $total_customers ?></span>
                                    </a>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>

    <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require "layouts/footer.php" ?>