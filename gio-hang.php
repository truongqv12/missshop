<?php
require_once "autoload/autoload.php";
$customer = new Database();
?>
<?php
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "<script>alert('Không có sản phẩm trong giỏ hàng');location.href='index.php'</script>";
}
?>
<?php include "layouts/head.php" ?>
<title>Miss Shop | Giỏ hàng</title>
<body>
    <div class="wrapper">
        <?php include "layouts/header.php" ?>
        <!--end header-menu-fluid-->

        <div class="container">
            <div class="main">

                <div class="main-container">
                    <div class="row">
                        <?php include "layouts/sidebar.php" ?>
                        <div class="col-md-9" style="background-color: #fff">
                            <?php if (isset($_SESSION['success'])): ?>
                                <div class="alert alert-success" style="margin: 10px">
                                    <?php
                                    echo $_SESSION['success'];
                                    unset($_SESSION['success'])
                                    ?>
                                </div>

                            <?php endif; ?>
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Tổng tiền</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $stt = 1;
                                    $sum = 0;
                                    $total = 0;
                                    foreach ($_SESSION['cart'] as $key => $value) :
                                        ?>
                                        <tr>
                                            <td><?= $stt ?></td>
                                            <td>
                                                <img src="<?php base_url() ?>public/uploads/products/<?= $value['image'] ?>" alt="" width="105px" height="116px">
                                            </td>
                                            <td><?= $value['name'] ?></td>
                                            <td >

                                                <input min="1" style="width: 60px;" type="number" value="<?= $value['qty'] ?>" class="form-control qty" style="width: 50px">

                                            </td>
                                            
                                            <td><?= number_format($value['price'], 0, ",", "."); ?> đ</td>
                                            <td><?= number_format($value['price'] * $value['qty'], 0, ",", "."); ?> đ</td>
                                            <td>
                                                <a href="" class="btn btn-xs btn-info update-cart" data-key = <?= $key ?>><i class="fa fa-refresh"></i> update</a>
                                                <a href="remove_cart.php?key=<?= $key ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></i> remove</a>
                                            </td>
                                        </tr>
                                        <?php
                                        $sum += $value['price'] * $value['qty'];
                                        $_SESSION['total'] = $sum;
                                        ?>
                                        <?php
                                        $stt++;
                                    endforeach;
                                    ?>

                                </tbody>

                            </table>
                            <h4 class="col-md-offset-9" style="font-weight: 700;">Tổng cộng: <?= number_format($_SESSION['total'], 0, ",", "."); ?> đ </h4>

                            <div class="col-md-2 col-md-offset-6" style="padding-bottom: 20px">
                                <a href="thanh-toan.php" class="btn btn-success"><i class="fa fa-credit-card"></i> Thanh toán
                                </a>

                            </div>

                            <div class="col-md-4" style="padding-bottom: 20px">
                                <a href="index.php" class="btn btn-warning"><i class="fa fa-undo"></i> Tiếp tục mua hàng
                                </a>

                            </div>
                        </div>

                        <!--end main-container-->
                    </div>
                    <!--end main-->
                </div>
                <!--end container-->
            </div>
        </div>

<?php include "layouts/footer.php" ?>
        <script src="<?php base_url() ?>public/frontend/js/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.update-cart').click(function (e) {
                    event.preventDefault();
                    var qty = $(this).parents("tr").find('.qty').val();
                    var key = $(this).attr('data-key');
                    $.ajax({
                        url: 'update-cart.php',
                        type: 'GET',
                        data: {'qty': qty, 'key': key},
                        success: function (data) {
                            if (data == 1) {
                                alert('Cập nhật giỏ hàng thành công');
                                location.href = "gio-hang.php";
                            }
                            if (data == 0) {
                                alert('Số lượng lớn hơn số lượng sản phẩm hiện có');
                                location.href = "gio-hang.php";
                            }
                        }
                    });
                });
            });
        </script>