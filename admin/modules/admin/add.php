<?php 

$open = "admin";
require "../../autoload/autoload.php";

require "../../layouts/head.php";
if ($_SESSION['level'] != 1) {
    echo "<script>alert('Bạn không có quyền thực hiện  chức năng này');location.href='http://localhost/doan/admin/dashboard.php'</script>";
}
?>

<?php
$cate = new Database();
$data = $cate->fetchAll("Categories");
// print_r($data);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $datas = [
        "name" => postInput("txtName"),
        "email" => postInput("email"),
        "phone" => postInput("phone"),
        "password" => md5(postInput("pass")),
        "level" => postInput('level')
    ];


    $error = [];

    if (postInput("txtName") == NULL) {
        $error['name'] = 'HỌ tên không được trống';
    }
    if (postInput("email") == NULL) {
        $error['email'] = 'email không được trống';
    }

    if (postInput("phone") == NULL) {
        $error['phone'] = 'Số điện thoại không được trống';
    }
    if (postInput("pass") == "") {
        $error['password'] = 'Mật khẩu không được trống';
    }
    if (postInput("password_confirmation") == NULL) {
        $error['password_confirmation'] = 'Chưa nhập lại mật khẩu';
    }
    if (postInput("pass") != postInput("password_confirmation")) {
        $error['password_confirm_failt'] = 'Mật khẩu nhập không khớp';
    }

    if (empty($error)) {

        $isset = $cate->fetchOne("admin", "email = '" . $datas['email'] . "'");
        if (count($isset) > 0) {
            $_SESSION['error'] = "Email đã tồn tại";
        } else {
            $result = $cate->insert(' admin', $datas);
            if (isset($result)) {
                $_SESSION['success'] = "Thêm mới thành công";
                redirectAdmin("admin");
            } else {
                $_SESSION['success'] = "Thêm mới thất bại";
            }
        }
    }
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
                    Admin
                    <small>Thêm</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Admin</a></li>
                    <li class="active">Thêm</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Họ và Tên</label>
                                <input type="text" class="form-control" placeholder="Họ và Tên" name="txtName" value="<?php echo old("txtName") ?>">
                                <?php
                                if (isset($error['name'])) {
                                    echo "<p class='text-danger'>$error[name].</p>";
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="text" class="form-control" placeholder="NguyenVanA@gmail.com" name="email" value="<?php echo old("email") ?>">
                                <?php
                                if (isset($error['email'])) {
                                    echo "<p class='text-danger'>$error[email].</p>";
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Phone</label>
                                <input type="text" class="form-control" placeholder="phone" name="phone" value="<?php echo old("phone") ?>">
                                <?php
                                if (isset($error['phone'])) {
                                    echo "<p class='text-danger'>$error[phone].</p>";
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mật khẩu</label>
                                <input type="password" class="form-control" placeholder="Mật khẩu" name="pass" value="<?php echo old("pass") ?>">
                                <?php
                                if (isset($error['password'])) {
                                    echo "<p class='text-danger'>$error[password].</p>";
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="password_confirmation">
                                <?php
                                if (isset($error['password_confirmation'])) {
                                    echo "<p class='text-danger'>$error[password_confirmation].</p>";
                                }
                                if (isset($error['password_confirm_failt'])) {
                                    echo "<p class='text-danger'>$error[password_confirm_failt].</p>";
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Chức vụ</label>
                                <select class="form-control" name="level">
                                    <option value="">Chọn chức vụ</option>
                                    <option value="1">Quản trị viên</option>
                                    <option value="2">Nhân viên</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Lưu lại</button>
                        </form>
                    </div>
                </div>

                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php require "../../layouts/footer.php" ?>