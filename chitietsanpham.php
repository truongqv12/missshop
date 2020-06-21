<?php
require_once "autoload/autoload.php";
$data = new Database();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$product = $data->fetchID('products', $id);
?>

<?php include "layouts/head.php" ?>
<title>Miss Shop | Chi tiết sản phẩm</title>
<body>
    <div class="wrapper">
        <?php include "layouts/header.php" ?>
        <div class="container">
            <div class="main">
                <div class="main-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4 img-product-detail">

                                <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                                    <div class='carousel-outer'>
                                        <!-- me art lab slider -->
                                        <div class='carousel-inner '>

                                            <div class='item active'>
                                                <img src='<?php base_url() ?>public/uploads/products/<?= $product['image']; ?>'
                                                     alt='' class="img-responsive" style="height: 500px">
                                            </div>

                                            <?php
                                            $product_img_detail = $data->fetchsql("SELECT * FROM pro_img WHERE pro_id = $id");
                                            ?>

                                            <?php foreach ($product_img_detail as $item): ?>
                                                <div class='item'>
                                                    <img src='<?php base_url() ?>public/uploads/products/details/<?= $item['links']; ?>'
                                                         alt='' class="img-responsive" style="height: 500px"/>
                                                </div>
                                            <?php endforeach; ?>

                                            <script>
                                                $("#zoom_05").elevateZoom({zoomType: "inner", cursor: "crosshair"});
                                            </script>
                                        </div>

                                        <!-- sag sol -->
                                        <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
                                            <span class="prev-slide"> &#10094 </span>
                                        </a>
                                        <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
                                            <span class='next-slide'>&#10095</span>
                                        </a>
                                    </div>

                                    <!-- thumb -->
                                    <ol class='carousel-indicators mCustomScrollbar meartlab'>
                                        <li data-target='#carousel-custom' data-slide-to='0' class='active'><img
                                                src='<?php base_url() ?>public/uploads/products/<?= $product['image']; ?>'
                                                alt=''/></li>


                                        <?php
                                        $count = 0;
                                        foreach ($product_img_detail as $item): $count++
                                            ?>
                                            <li data-target='#carousel-custom' data-slide-to='<?= $count ?>'><img
                                                    src='<?php base_url() ?>public/uploads/products/details/<?= $item['links']; ?>'
                                                    alt=''/></li>
                                            <?php endforeach; ?>

                                    </ol>
                                </div>

                                <script type="text/javascript">

                                    $(document).ready(function () {
                                        $(".mCustomScrollbar").mCustomScrollbar({axis: "x"});
                                    });
                                </script>

                            </div>
                            <form action="addcart.php?id=<?= $product['id'] ?>" method="post">
                                <div class="col-md-6 entry-summary">
                                    <h1 class="product_title entry-title"><?php echo $product['pro_name'] ?></h1>
                                    <p class="price"><?php echo number_format($product['price'], 0, ",", "."); ?> đ</p>
                                    <div class="description">
                                        <!--                                $string = substr($string, 0, 350);-->
                                        <p><?= substr($product['description'], 0, 350) ?>...</p>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-1">
                                            <label>Size</label>
                                        </div>
                                        <div class="col-md-5">

                                            <?php
                                            $size = $product['size'];
                                            $result_size = explode(',', $size);
                                            ?>
                                            <select class="form-control" name="size">
                                                <?php foreach ($result_size as $item): ?>
                                                    <option value="<?= $item ?>"><?= $item ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2">Số lượng</label>

                                        <div class="col-md-4">
                                            <input type="number" style="width: 50px" min="1" value="1" qty-pro="<?= $product['qty'] ?>" class="form-control qty" name="qty">
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <div class="col-md-1">
                                            <label>Màu</label>
                                        </div>
                                        <div class="col-md-5">
                                            <?php
                                            $color = $product['color'];
                                            $result_color = explode(',', $color);
                                            ?>
                                            <select class="form-control" name="color">
                                                <?php foreach ($result_color as $item): ?>
                                                    <option value="<?= $item ?>"><?= $item ?></option>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="single_add_to_cart_button btn-danger">Thêm vào
                                                giỏ hàng
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-7">
                                                <a href="tel: 0363207542">
                                                    <button class="custome-hotline form-control"><i class="fa fa-phone"></i>
                                                        HOTLINE: 0363207542
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </form>
                            <div class="col-md-2 custome-single-shoping">
                                <div class="col-md-12 item-custome-single-shoping">
                                    <i class="fa fa-car"></i>
                                    <p class="text-center">Miễn phí vận chuyển với đơn hàng lớn hơn 1.000.000 đ</p>
                                </div>

                                <div class="col-md-12 item-custome-single-shoping">
                                    <span><img src="<?php base_url() ?>public/images/vanchuyen.PNG" alt=""></span>
                                    <p class="text-center">Đổi trả trong 3 ngày, thủ tục đơn giản</p>
                                </div>

                                <div class="col-md-12 item-custome-single-shoping">
                                    <span><img src="<?php base_url() ?>public/images/tuvan.PNG" alt=""></span>
                                    <p class="text-center">Miễn phí vận chuyển với đơn hàng lớn hơn 1.000.000 đ</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="discription">
                                <div class="col-md-3">
                                    <h2>Mô tả sản phẩm</h2>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                    <div class="dis-content"><?= $product['description'] ?></div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php include "layouts/footer.php" ?>
        <script src="<?php base_url() ?>public/frontend/js/jquery.min.js"></script>
        <script src="<?php base_url() ?>public/frontend/js/myscript.js"></script>
        <script type="text/javascript">
                                    $(document).ready(function () {
                                        $(".qty").bind('keyup mouseup', function () {
                                            var qty = $(this).val();
                                            var qty_pro = $(this).attr('qty-pro');
                                            qty_pro = parseInt(qty_pro);
                                            // alert(qty_pro-1);
                                            if (qty > qty_pro) {
                                                alert('Số lượng lơn hơn số lượng của sản phẩm');
                                                $('.qty').val(qty - 1);
                                            }
                                        });



                                    });
        </script>
