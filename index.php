<?php
require_once "autoload/autoload.php";
$data = new Database();
?>
<?php include "layouts/head.php" ?>
<title>Miss Shop</title>
<body>
    <div class="wrapper">
        <?php include "layouts/header.php" ?>
        <!--end header-menu-fluid-->

        <div class="container">
            <div class="main">
                <?php include "layouts/slide.php" ?>
                <!--end slide -->
                <div class="main-container">
                    <div class="row">
                        <?php include "layouts/sidebar.php" ?>
                        <div class="col-md-9 col-sm-9">
                            <div class="main-right">
                                <div class="shop-homepage">
                                    <div class="filter-title-product">
                                        <a href="">SẢN PHẨM <b>BÁN CHẠY</b></a>
                                    </div>
                                    <div class="list-product">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php
                                                $pro_hot = $data->fetchsql("SELECT * FROM products WHERE active = 1  ORDER BY pay DESC LIMIT 4");
                                                ?>
                                                <?php foreach ($pro_hot as $item): ?>
                                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                                        <div class="item-product">
                                                            <div class="img-product img-responsive">
                                                                <a href="chitietsanpham.php?id=<?= $item['id'] ?>"><img class="img-responsive" src="<?php base_url() ?>public/uploads/products/<?= $item['image']; ?>" alt="" height="100%" title="<?= $item['pro_name']?>"></a>
                                                            </div>
                                                            <div class="name-product">
                                                                <a href="chitietsanpham.php?id=<?= $item['id'] ?>" title="<?= $item['pro_name'] ?>"><?= $item['pro_name'] ?></a>
                                                            </div>

                                                            <p class="price-product" style="margin-bottom:10px"><?php echo number_format($item['price'], 0, ",", "."); ?> đ</p>
                                                            <?php if($item['qty'] == 0 ){
                                                                echo "<em style='color: red'>Hết hàng</em>";
                                                            }?>

<!--                                                            <a href="chitietsanpham.php?id=<?= $item['id'] ?>" title="Xem chi tiết">Xem chi tiết</a>-->
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--                            shop-homepage-->
                                <div class="shop-homepage">
                                    <div class="filter-title-product">
                                        <a href="">SẢN PHẨM <b>MỚI NHẤT</b></a>
                                    </div>
                                    <div class="list-product">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php
                                                $pro_news = $data->fetchsql("SELECT * FROM products WHERE active = 1 ORDER BY id DESC LIMIT 8");
                                                ?>
                                                <?php foreach ($pro_news as $item): ?>
                                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                                        <div class="item-product">
                                                            <div class="img-product img-responsive">
                                                                <a href="chitietsanpham.php?id=<?= $item['id'] ?>"><img class="img-responsive" src="<?php base_url() ?>public/uploads/products/<?= $item['image']; ?>" alt="" height="100%"></a>
                                                            </div>
                                                            <div class="name-product">
                                                                <a href="chitietsanpham.php?id=<?= $item['id'] ?>"><?= $item['pro_name'] ?></a>
                                                            </div>
                                                            <p class="price-product"><?php echo number_format($item['price'], 0, ",", "."); ?> đ</p>
                                                            <?php if($item['qty'] == 0 ){
                                                                echo "<em style='color: red'>Hết hàng</em>";
                                                            }?>

                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end shop-homepage-->
                              

                                <div class="shop-homepage">
                                    <div class="filter-title-product">
                                        <a href="">SẢN PHẨM <b>NỔI BẬT</b></a>
                                    </div>
                                    <div class="list-product">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php
                                                $pro_hot = $data->fetchsql("SELECT * FROM products  WHERE hot = 1 AND active = 1 ORDER BY ID DESC LIMIT 8");
                                                ?>
                                                <?php foreach ($pro_hot as $item): ?>
                                                     <div class="col-md-3 col-sm-6 col-xs-6">
                                                        <div class="item-product">
                                                            <div class="img-product img-responsive">
                                                                <a href="chitietsanpham.php?id=<?= $item['id'] ?>"><img class="img-responsive" src="<?php base_url() ?>public/uploads/products/<?= $item['image']; ?>" alt="" height="100%"></a>
                                                            </div>
                                                            <div class="name-product">
                                                                <a href="chitietsanpham.php?id=<?= $item['id'] ?>"><?= $item['pro_name'] ?></a>
                                                            </div>
                                                            <p class="price-product"><?php echo number_format($item['price'], 0, ",", "."); ?> đ</p>
                                                             <?php if($item['qty'] == 0 ){
                                                                echo "<em style='color: red'>Hết hàng</em>";
                                                            }?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end shop-home-page-->
                            </div>
                        </div>
                    </div>
                    <!--end main-container-->
                </div>
                <!--end main-->
            </div>
            <!--end container-->
        </div>
        <?php include "layouts/footer.php" ?>
