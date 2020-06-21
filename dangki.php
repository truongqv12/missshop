<?php
    require_once "autoload/autoload.php";
    $customer = new Database();
?>

<?php
    if (isset($_SESSION['customer_name'])) {
        echo "<script>alert('Bạn đã có tài khoản');location.href='index.php'</script>";
    }
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = [
        'name' => postInput('name'),
        'email' => postInput('email'),
        'password' => md5(postInput('password')),

    ];

    $error = array();
    if (postInput('name') == NULL) {
        $error['name'] = 'Họ Tên không được trống';

    }
    if (postInput('email') == NULL ) {
        $error['email'] = 'Email không được trống';

    } else {
        $is_check = $customer->fetchOne("customers"," email = '".$data['email']."' ");
        if ($is_check != NULL) {
            $error['email'] = 'Email đã tồn tại.';
        }

    }
    if (postInput('password') == NULL ) {
        $error['pass'] = 'Mật khẩu không được trống';

    }
    if (postInput('passwordconfirm') == NULL ) {
        $error['passwordconfirm'] = 'Bạn chưa nhập lại mật khẩu';

    }
    if (postInput('password')!= postInput('passwordconfirm')) {
        $error['passwordagain'] = 'Mật khẩu không khớp';
    }


    if (empty($error)) {
        $result = $customer->insert('customers',$data);
        if (isset($result)) {
            $_SESSION['name_customer'] = 'Đăng kí thành công';
            header("location:dangnhap.php");
        }
    }
}
?>

<?php include "layouts/head.php" ?>
 <title>Miss Shop | Đăng ký</title>
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
                                                <p style="padding-top: 20px">Đăng ký</p>
                                                <div class="register">
                                                    <form action="" method="post" for>
                                                        <div class="form-group">
                                                            <label for="">Họ Và Tên</label>
                                                            <input type="text" class="form-control" name="name" placeholder="Nhập họ và tên..."
                                                                   value="<?= old('name') ?>">
                                                            <?php
                                                            if (isset($error['name'])) echo "<p class='text-danger'>" . $error['name'];
                                                            ?>
                                                        </div>
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
                                                            <label for="">Nhập lại mật khẩu</label>
                                                            <input type="password" class="form-control" name="passwordconfirm" placeholder="Nhập lại mật khẩu...">
                                                            <?php
                                                            if (isset($error['passwordconfirm'])) echo "<p class='text-danger'>" . $error['passwordconfirm'];
                                                            if (isset($error['passwordagain'])) echo "<p class='text-danger'>" . $error['passwordagain'];
                                                            ?>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary">Đăng ký
                                                            </button>
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
