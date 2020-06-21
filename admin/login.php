<?php
    require "autoload/autoload.php";
        $user = new Database();
        $data = [
            "email" => postInput("email"),
            "password" =>postInput("password"),
        ];

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $error = array();

        if ($data['email'] == NULL) {
            $error['email'] = "Email không được trống";
        }

        if ($data['password'] == NULL) {
            $error['password'] = "Mật khẩu không được trống";
        }

        if (empty($error)) {
            $is_check = $user->fetchOne("admin"," email = '".$data['email']."' AND password = '".md5($data['password'])."' ");
            if (isset($is_check) != NULL) {
                $_SESSION['user_name'] = $is_check['name'];
                $_SESSION['level'] = $is_check['level'];
                $_SESSION['user_id'] = $is_check['id'];

                if (isset($_POST['renember'])) {
                    setcookie("admin",postInput("email"),time()+3600);
                    setcookie("pass",postInput("password"),time()+3600);
                    echo "<script type='text/javascript'>alert('Đăng nhập thành công');location.href='".base_url()."admin/dashboard.php'</script>";

                } else {
                    setcookie("admin",postInput("email"),time()-3600);
                    setcookie("pass",postInput("password"),time()-3600);
                }

                echo "<script type='text/javascript'>alert('Đăng nhập thành công');location.href='".base_url()."admin/dashboard.php'</script>";
            } else {
                $_SESSION['error_login'] = "Tài khoản hoặc mật khẩu không chính xác";
            }
        }
    }
//?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Miss Shop | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url() ?>public/plugin/iCheck/square/blue.css">


</head>


<body class="hold-transition login-page">
<div class="login-box">

    <!-- /.login-logo -->
    <div class="login-box-body">
        <h3 class="login-box-msg">Đăng nhập hệ thống</h3>
        <?php if (isset($_SESSION['error_login'])):?>
        <div class="text text-danger">
            <?php echo $_SESSION['error_login']; session_unset();?>
        </div>
        <?php endif ?>
        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Email" name="email"  value="<?php if (isset($_COOKIE['admin'])) echo $_COOKIE['admin'] ?>">
                <?php if (isset($error['email'])) {
                    echo "<p class='text-danger'>$error[email].</p>";
                } ?>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" value="<?php if (isset($_COOKIE['pass'])) echo $_COOKIE['pass']?>">
                <?php if (isset($error['password'])) {
                    echo "<p class='text-danger'>$error[password].</p>";
                } ?>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="renember" <?php if (isset($_COOKIE['admin'])) echo 'checked'?>> Ghi nhớ mật khẩu
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>public/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url() ?>public/plugin/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
