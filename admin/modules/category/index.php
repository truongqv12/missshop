<?php 
    $open = "category";
    require "../../autoload/autoload.php";
    
    require "../../layouts/head.php";
    ?>

    <?php 
        $cate = new Database();
        $data = $cate->fetchAll("Categories");
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
                    Danh mục
                    <small>danh sách</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Danh mục</a></li>
                    <li class="active">Danh sách</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="box-body">
                    <?php require_once '../../../partials/notification.php'; ?>
                    <a href="<?php echo modules('category') ?>/add.php" class="btn btn-primary pull-right">Create</a><br><br>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Tên danh mục</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach ($data as $item): ?>
                                <tr>
                                    <td><?= $item['ID'] ?></td>
                                    <td><?= $item['name'] ?></td>
                                    <td>
                                        <a href="edit.php?id=<?= $item['ID'] ?>" class="btn btn-xs btn-warning">Edit</a> |
                                        <a onclick="return confirm('Bạn chắc chắn xóa? ')" href="delete.php?id=<?= $item['ID'] ?>" class="btn btn-xs btn-danger">Delete</a>
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