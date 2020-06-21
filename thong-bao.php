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
<title>Miss Shop | Thông báo</title>
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
                                <?php if (isset($_SESSION['success'])): ?>
                                    <div class="alert alert-success" style="margin: 10px">
                                        <?php echo $_SESSION['success'];
                                            unset($_SESSION['success'])
                                        ?>
                                    </div>

                                <?php endif; ?>

                                <a href="index.php" class="btn btn-success" style="margin: 10px">Trở về trang chủ</a>
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
