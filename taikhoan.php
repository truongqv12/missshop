<?php
    require_once "autoload/autoload.php";
    $data = new Database();
?>
<?php include "layouts/head.php" ?>
<title>Miss Shop | Tài khoản</title>
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
                                    <h4 href="" style="color: #EA4242;font-weight: bold;padding: 10px 5px;">Tài khoản
                                        của tôi</h4>
                                </div>
                                <div class="list-product">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <p style="padding-top: 20px">Đăng nhập</p>
                                                <div class="login">
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label for="">Tên tài khoản hoặc địa chỉ email</label>
                                                            <input type="text" class="form-control" name="username">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Mật khẩu</label>
                                                            <input type="text" class="form-control" name="password">
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="checkbox">
                                                                <label><input type="checkbox"> Ghi nhớ mật khẩu</label>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Đăng nhập
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <p style="padding-top: 20px">Đăng ký</p>
                                                <div class="register">
                                                    <div class="form">
                                                        <div class="form-group">
                                                            <label for="">Họ Và Tên</label>
                                                            <input type="text" class="form-control" name="name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Địa chỉ email</label>
                                                            <input type="text" class="form-control" name="email">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Mật khẩu</label>
                                                            <input type="text" class="form-control" name="password">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Nhập lại mật khẩu</label>
                                                            <input type="text" class="form-control"
                                                                   name="passwordconfirm">
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary">Đăng kí
                                                            </button>
                                                        </div>
                                                    </div>
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
