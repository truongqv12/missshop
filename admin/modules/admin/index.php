<?php
$open = "admin";
require "../../autoload/autoload.php";

require "../../layouts/head.php";
?>

<?php
$user = new Database();
$data = $user->fetchAll("admin");
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
                    <small>danh sách</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Admin</a></li>
                    <li class="active">Danh sách</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        <?php require_once '../../../partials/notification.php'; ?>

                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">id</th>
                                    <th>name</th>
                                    <th>Email</th>
                                    <th>Level</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach ($data as $item): ?>
                                    <tr>
                                        <td><?= $item['id'] ?></td>
                                        <td><?= $item['name'] ?></td>
                                        <td><?= $item['email'] ?></td>
                                        <td>
                                            <?php
                                            if ($item['level'] == 1)
                                                echo 'Quản trị viên';
                                            else if ($item['level'] == 2)
                                                echo 'Nhân viên';
                                            ?>
                                        </td>

                                        <td>
                                            <a href="<?php echo modules('admin') ?>/edit.php?id=<?= $item["id"] ?>" class="btn btn-xs btn-info inline"><i class="fa fa-edit"></i>
                                                Edit</a>

                                            <a class="btn btn-xs btn-danger" onclick="return confirm('Bạn chắc chắn xóa? ')"
                                               href="delete.php?id=<?= $item['id'] ?>"><i class="fa fa-trash"></i>
                                                Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php require "../../layouts/footer.php" ?>