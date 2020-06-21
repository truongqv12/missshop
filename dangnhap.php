<?php
require_once "autoload/autoload.php";
$customer = new Database();

?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = [
        'email' => postInput('email'),
        'password' => postInput('password'),

    ];

    $error = array();

    if (postInput('email') == NULL ) {
        $error['email'] = 'Email không được trống';

    }
    if (postInput('password') == NULL ) {
        $error['pass'] = 'Mật khẩu không được trống';
    }

    if (empty($error)) {
        $is_check = $customer->fetchOne("customers"," email = '".$data['email']."' AND password = '".md5($data['password'])."' ");

        if ($is_check != NULL) {
            $_SESSION['customer_name'] = $is_check['name'];
            $_SESSION['customer_id'] = $is_check['id'];

            echo "<script>alert('Đăng nhập thành công');location.href='index.php'</script>";

        } else {
            $_SESSION['error_login_customer'] = "Tài khoản hoặc mật khẩu không chính xác";

        }
    }
}
?>

<?php include "layouts/head.php" ?>
<title>Miss Shop | Đăng nhập</title>
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
                            <div class="shop-homepage" style="background-color: #fff">
                                <div class="filter-title-product-login">
                                    <h4 href="" style="color: #EA4242;font-weight: bold;padding: 10px 5px;">Tài khoản
                                        của tôi</h4>
                                </div>
                                <div class="list-product">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="col-md-6">
                                                <?php if (isset($_SESSION['error_login_customer'])):?>
                                                    <div class="text text-danger">
                                                        <?php echo $_SESSION['error_login_customer']; session_unset();?>
                                                    </div>
                                                <?php endif ?>

                                                <?php
                                                    if (isset($_SESSION['name_customer'])) {
                                                        echo " <p class=\"text-success\" style=\"margin-top: 10px\">$_SESSION[name_customer]</p>"; unset($_SESSION['name_customer']);
                                                    }
                                                ?>

                                                <p style="padding-top: 10px">Đăng nhập</p>
                                                <div class="register">
                                                    <form action="" method="post">
                                                        <div class="form-group">
                                                            <label for="">Địa chỉ email</label>
                                                            <input type="text" class="form-control" name="email" value="<?= old('email') ?>" placeholder="Nhập địa chỉ email...">
                                                            
                                                            <?php
                                                            if (isset($error['email'])) echo "<p class='text-danger'>" . $error['email'];
                                                            ?>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Mật khẩu</label>
                                                            <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu...">
                                                            <?php
                                                            if (isset($error['pass'])) echo "<p class='text-danger'>" . $error['pass'];
                                                            ?>
                                                        </div>

                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary"> <i class="fa fa-sign-in"></i> Đăng Nhập</button>
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
                </div>
                <!--end main-container-->
            </div>
            <!--end main-->
        </div>
        <!--end container-->
    </div>

    <?php include "layouts/footer.php" ?>
