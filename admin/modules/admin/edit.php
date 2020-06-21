<?php
$open = "admin";
require "../../autoload/autoload.php";
$db = new Database();
require "../../layouts/head.php";
$id = getInput('id');
$infor = $db->fetchID('admin', $id);

if ($_SESSION['level'] != 1 && $_SESSION['user_id'] != $id) {
    echo "<script>alert('Bạn không có quyền thực hiện  chức năng này');location.href='http://localhost/doan/admin/modules/admin/'</script>";
}
?>

<?php
if (isset($_POST['btn_change'])) {
    $data = [
        'password' => md5(postInput('password')),
    ];


    $level = postInput('level');
    $error = array();
    if (isset($_POST['check-change-pass'])) {
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
            $sql = "UPDATE admin SET password = '$pass' WHERE id = $id";
            $result = $db->query($sql);
            $_SESSION['success'] = 'Cập nhật tài khoản thành công';
            redirectAdmin("admin");
        }
    }

    if (isset($_POST['level'])) {
        $sql = "UPDATE admin SET level = '$level' WHERE id = $id";
        $result = $db->query($sql);
    }
    if (isset($result)) {
        $_SESSION['success'] = 'Cập nhật tài khoản thành công';
        redirectAdmin("admin");
    }
//    redirectAdmin("admin");
}
?>
<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <?php require "../../layouts/header.php" ?>
        <!-- =============================================== -->
        <!-- Left side column. contains the sidebar -->
        <?php require "../../layouts/sidebar.php" ?>
        <!-- =============================================== -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Nhân viên
                    <small>Sửa</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Nhân viên</a></li>
                    <li class="active">Sửa</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="box-body">
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
                                    <label for="exampleInputPassword1">Chức vụ</label>
                                    <select class="form-control" name="level" <?php if ($id == $_SESSION['user_id'] && $_SESSION['user_id'] != 1) echo 'disabled'; ?> >
                                        <option value="">Chọn chức vụ</option>
                                        <option value="1" <?php if ($infor['level'] == 1) echo "selected" ?>>Quản trị viên</option>
                                        <option value="2" <?php if ($infor['level'] == 2) echo "selected" ?>>Nhân viên</option>
                                    </select>
                                </div>

                                <?php if ($_SESSION['user_id'] == $id): ?>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="" name="check-change-pass" id="check-change-pass">Đổi mật khẩu</label>
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
                                    <?php endif; ?>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success" name="btn_change">Lưu lại</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
               
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php require "../../layouts/footer.php" ?>

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