<?php
$open = "user";
require "../../autoload/autoload.php";

require "../../layouts/head.php";
?>

<?php
$user = new Database();
$data = $user->fetchAll("customers");
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
                Người dùng
                <small>danh sách</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">user</a></li>
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
                            <th>Action</th>
                        </tr>
                        <?php foreach ($data as $item): ?>
                            <tr>
                                <td><?= $item['id'] ?></td>
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['email'] ?></td>
                                <td>
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