<?php
require_once "autoload/autoload.php";
$data = new Database();
?>


<div class="header container-fluid">
    <div class="row header-top-fluid">
        <div class="header-top">
            <div class="container">
                <a href="tel:0363207542" class="col-md-8 col-sm-4 col-xs-12"><i class="fa fa-phone"></i> Hotline: 0363207542</a>


                <?php if (isset($_SESSION['customer_name'])): 
                    ?>

                    <div class="col-md-2 col-sm-4 col-xs-12 ">
                        <div class="dropdown">
                            <p class="my-acount dropdown-toggle" data-toggle="dropdown"><a
                                    href=""><i class="fa fa-user"></i> <?php echo $_SESSION['customer_name']; ?></a>
                            <span class="caret"></span></p>
                            <ul class="dropdown-menu acount" style="margin-left: 83px">
                                <li><a href="<?php base_url() ?>thong-tin-tai-khoan.php"> Thông tin</a></li>
                                <li><a href="<?php base_url() ?>gio-hang.php">Giỏ hàng</a></li>
                                <li><a href="<?php base_url()?>logout.php">Thoát</a></li>
                            </ul>
                        </div>
                    </div>
                <?php else: ?>
                    <p class="col-md-2 col-sm-4 col-xs-12 my-acount"><a href="<?php base_url() ?>dangnhap.php">Đăng
                            nhập </a> |
                        <a href="<?php base_url() ?>dangki.php">Đăng kí</a></p>
                <?php endif; ?>

                <a href="<?php base_url() ?>thanh-toan.php" class="col-md-2 col-sm-4 col-xs-12 pay"><i class="fa fa-credit-card"></i> Thanh toán</a>
            </div>
        </div>
    </div>
</div>
<div class="header-bottom container">
    <div class="logo col-md-4 col-sm-12">
        <a href="<?php base_url() ?>index.php"><img src="<?php base_url() ?>public/frontend/images/missshop.png" alt="" class="img-responsive"></a>
    </div>
    <div class="page-search col-md-5 col-sm-9 col-xs-12">
        <div id="search">
            <form role="search" action="<?php base_url() ?>search.php" method="post">
                <input class="form-control" type="text" value="" name="s" id="s" placeholder="Nhập từ khóa cần tìm">
                <input type="submit" class="search-submit" value="Tìm kiếm">
            </form>
        </div>
    </div>
    <div class="cart-contents col-md-3 col-sm-3 col-xs-12">
        <i class="fa fa-shopping-cart"></i>
        <span class="title-cart"> Giỏ Hàng</span>
        <div class="clear"></div>
        <a class="header-cart" href="<?php base_url() ?>gio-hang.php" title="Gio hàng"><?php if(isset($_SESSION['cart'])) echo count($_SESSION['cart']); else echo 0?> sản phẩm </a>
    </div>
</div>

<div class="header-menu-fluid container-fluid">
    <div class="header-menu container">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Menu</a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i> Trang chủ</a></li>
                    <li><a href="<?php base_url() ?>gioi-thieu.php">giới THIỆU</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">DANH MỤC SẢN PHẨM <span class="caret"></span></a>
                        <ul class="dropdown-menu" style="width: 100%">
                            <?php $menu = $data->fetchAll('categories'); ?>
                            <?php foreach ($menu as $item_menu): ?>
                                <li><a href="<?php base_url() ?>danh-muc.php?id=<?= $item_menu['ID'] ?>"><?= $item_menu['name'] ?></a></li>
                            <?php endforeach; ?>

                        </ul>
                    </li>
                    <li><a href="<?php base_url() ?>tintuc.php">tin tức</a></li>
            
                </ul>

            </div><!--/.nav-collapse -->

        </nav>
        <!--end nav-->
    </div>
    <!--end header-menu-->
</div>