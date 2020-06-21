<?php
require_once "autoload/autoload.php";
$db = new Database();
$id = $_SESSION['customer_id'];
$infor = $db->fetchID('customers', $id);
?>

<?php
if (isset($_POST['btn_change'])) {
    $data = [
        'password' => md5(postInput('password')),
    ];

    if (isset($_POST['check-change-pass'])) {

        $error = array();
        if (postInput('password') == NULL) {
            $error['password'] = 'Mật khẩu được trống';
        }
        if (postInput('password_confirm') == NULL) {
            $error['password_confirm_error'] = 'Bạn phải nhập lại mật khẩu';
        }

        if (postInput('password_confirm') != postInput('password')) {
            $error['password_confirm'] = 'Mật khẩu không khớp';
        }
        if (empty($error)) {
            $pass = $data['password'];
            $sql = "UPDATE customers SET password = '$pass' WHERE id = $id";
            $result = $db->query($sql);
            if (isset($result)) {
                $_SESSION['name_customer'] = 'Đổi mật khẩu thành công';
                header("location:dangnhap.php");
            }
        }
    }
}
?>

<?php include "layouts/head.php" ?>
<title>Miss Shop | Thông tin tài khoản</title>
<body>
    <div class="wrapper">
        <?php include "layouts/header.php" ?>
        <!--end header-menu-fluid-->

        <div class="container">
            <div class="main">

                <div class="main-container">
                    <div class="row">
                        <?php include "layouts/sidebar.php" ?>

                        <div class="col-md-9 col-sm-9">
                            <div class="main-right">
                                <div class="shop-homepage">
                                    <div class="filter-title-product">
                                        <h4 href="" style="color: #EA4242;font-weight: bold;padding: 10px 5px;">Thông tin tài khoản
                                            của tôi</h4>
                                    </div>
                                    <div class="list-product">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="col-md-6">

                                                    <form action="" method="post" id="form_infor">
                                                        <div class="form-group">
                                                            <label for="">Họ và tên</label>
                                                            <input type="text" class="form-control" name="email" value="<?= $infor['name'] ?>" disabled>

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Địa chỉ email</label>
                                                            <input type="text" class="form-control" name="email" value="<?= $infor['email'] ?>" disabled>

                                                        </div>


                                                        <div class="form-group">
                                                            <div class="checkbox">
                                                                <label><input type="checkbox" value="" id="check-change-pass" name="check-change-pass">Đổi mật khẩu</label>
                                                            </div>

                                                        </div>

                                                        <div class="change-pass">
                                                            <div class="form-group">
                                                                <label for="">Mật khẩu mới</label>
                                                                <input type="password" class="form-control inputDisabled" name="password" disabled>
                                                                <?php
                                                                if (isset($error['password']))
                                                                    echo "<p class='text-danger'>" . $error['password'];
                                                                ?>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">Nhập lại mật khẩu</label>
                                                                <input type="password" class="form-control inputDisabled" name="password_confirm" disabled="">
                                                                <?php
                                                                if (isset($error['password_confirm_error']))
                                                                    echo "<p class='text-danger'>" . $error['password_confirm_error'];
                                                                if (isset($error['password_confirm']))
                                                                    echo "<p class='text-danger'>" . $error['password_confirm'];
                                                                ?>


                                                            </div>

                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-success" name="btn_change">Lưu lại</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>


                                        </div>

                                    </div>

                                </div>

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

        <script>
            $(document).ready(function () {


                $('#check-change-pass').change(function () {

                    if ($(this).is(':checked')) {
                        $('.inputDisabled').removeAttr("disabled")
                    } else {
                        $('.inputDisabled').attr("disabled", true);
                    }

                });


            });
        </script>

