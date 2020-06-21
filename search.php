<?php
require_once "autoload/autoload.php";
$db = new Database();

if (isset($_POST['s'])) {
    $key = $_POST['s'];
    $sql = "SELECT * FROM products WHERE pro_name LIKE '%$key%'";
    $products = $db->fetchsql($sql);
    $total = $db->count_sql($sql);
//    var_dump($poducts);
}
?>
<?php include "layouts/head.php" ?>
<title>Miss Shop | Tìm kiếm</title>
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
                                        <h2 style="font-weight: 600;font-size: 14px;padding-left: 15px;">KẾT QUẢ TÌM KIẾM TỪ KHÓA: "<?= $key ?>" có <span style="color: red"> <?= $total ?> </span> KẾT QUẢ</h2>

                                    </div>
                                    <div class="list-product">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <?php foreach ($products as $item): ?>

                                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                                        <div class="item-product">
                                                            <div class="img-product img-responsive">
                                                                <a href="chitietsanpham.php?id=<?= $item['id'] ?>"><img class="img-responsive" src="<?php base_url() ?>public/uploads/products/<?= $item['image']; ?>" alt="" height="100%"></a>
                                                            </div>
                                                            <div class="name-product">
                                                                <a href="chitietsanpham.php?id=<?= $item['id'] ?>"><?php echo $item['pro_name'] ?></a>
                                                            </div>

                                                            <p class="price-product"><?php echo number_format($item['price'], 0, ",", "."); ?> đ</p>
                                                             <?php if($item['qty'] == 0 ){
                                                                echo "<em style='color: red'>Hết hàng</em>";
                                                            }?>

                                                            <a href="addcart.php?id=<?= $item['id'] ?>" title="Thêm và giỏ hàng"> <i class="add_cart fa fa-cart-plus"></i></a>


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




