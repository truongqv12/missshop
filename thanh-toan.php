<?php
require_once "autoload/autoload.php";
$db = new Database();
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "<script>alert('Không có sản phẩm để thanh toán');location.href='index.php'</script>";
}
if (!isset($_SESSION['customer_name'])) {
    echo "<script>alert('Bạn phải đăng nhập mới thực hiện được chức năng này');location.href='dangnhap.php'</script>";
}
$customer = $db->fetchID("customers", $_SESSION['customer_id']);
?>


<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $data = [
        "customer_id" => $_SESSION['customer_id'],
        "total" => $_SESSION['total'],
        "phone" => postInput('phone'),
        'address' => postInput('address'),
        "note" => postInput("note"),
    ];

    $error = array();
    if (postInput('phone') == null) {
        $error['phone'] = "Số điện thoại không được để trống";
    }
    if (postInput('address') == null) {
        $error['address'] = "Địa chỉ không được để trống";
    }

    if (empty($error)) {
        $result = $db->insert('orders', $data);
    }

    if (isset($result) > 0) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $data_oder_detail = [
                'pro_id' => $key,
                'oder_id' => $result,
                'qty' => $value['qty'],
                'price' => $value['price'],
            ];
            $result_oder_detail = $db->insert('order_detail', $data_oder_detail);

        }
        unset($_SESSION['cart']);
        unset($_SESSION['total']);
        $_SESSION['success'] = "Lưu thông tin đơn hàng thành công";
        header("Location:thong-bao.php");
    }
}
?>
<?php include "layouts/head.php" ?>
<title>Miss Shop | Thanh toán</title>
<body>
    <div class="wrapper">
        <?php include "layouts/header.php" ?>
        <!--end header-menu-fluid-->

        <div class="container">
            <div class="main">

                <div class="main-container">
                    <div class="row">
                        <?php include "layouts/sidebar.php" ?>
                        <div class="col-md-9" style="background-color: #fff ; padding: 20px">


                            <form action="" method="post">
                                <div class="col-md-6">
                                    <h4>Thông tin thanh toán</h4>
                                    <div class="form-group">
                                        <label for="">Họ tên</label>
                                        <input type="text" name="name" class="form-control" readonly=""
                                               value="<?php echo $customer['name'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Địa chỉ email</label>
                                        <input type="text" name="email" class="form-control" readonly=""
                                               value="<?php echo $customer['email'] ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Số điện thoại</label>
                                        <input type="text" name="phone" class="form-control" value="<?= old("phone") ?>" placeholder="Nhập số điện thoại...">
                                        <?php
                                        if (isset($error['phone']))
                                            echo "<p class='text-danger'>" . $error['phone'];
                                        ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Địa chỉ</label>
                                        <input type="text" name="address" class="form-control" value="<?= old("address") ?>" placeholder="Nhập địa chỉ...">
                                        <?php
                                        if (isset($error['address']))
                                            echo "<p class='text-danger'>" . $error['address'];
                                        ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h4>Thông tin thêm</h4>
                                    <div class="form-group">
                                        <label for="">Ghi chú</label>
                                        <textarea type="note" name="note" class="form-control"
                                                  placeholder="Ghi chú về đơn hàng, ví dụ: lưu ý khi giao hàng."></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-md-offset-5">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-check"></i> Xác nhận</button>
                                </div>
                            </form>

                        </div>

                        <!--end main-container-->
                    </div>
                    <!--end main-->
                </div>
                <!--end container-->
            </div>
        </div>

        <?php include "layouts/footer.php" ?>
