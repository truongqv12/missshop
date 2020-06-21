<?php 
     $open = "news";
    require "../../autoload/autoload.php";
    
    require "../../layouts/head.php";
    ?>

    <?php 
        $db = new Database();
        $data = $db->fetchAll("news");
     
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
                    <li><a href="#">Tin tức</a></li>
                    <li class="active">Danh sách</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="box-body">
                    <?php require_once '../../../partials/notification.php'; ?>
                    <a href="<?php echo modules('news') ?>/add.php" class="btn btn-primary pull-right">Create</a><br><br>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Tiêu đề</th>
                                    <th>Hình ảnh</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach ($data as $item) { ?>
                                <tr>
                                    <td><?= $item["id"]  ?></td>
                                    <td><?= $item["title"]  ?></td>
                                     <td>
                         
                                         <img class="img-responsive col-md-6" src="../../../public/uploads/news/<?= $item['image'] ?>" alt="" style="height:150px;width:300px">
                                 
                                     </td> 
                                    
                                          <td>
                                      
                                          <a href="<?php echo modules('news') ?>/edit.php?id=<?= $item["id"]?>" class="btn btn-xs btn-info inline"  class="btn btn-xs btn-warning">Edit</a>
                                          <a onclick="return confirm('Bạn chắc chắn xoa ?')" href="<?php echo modules('news') ?>/delete.php?id=<?= $item["id"]?>" class="btn btn-xs btn-danger inline"  class="btn btn-xs btn-danger">Delete</a>
                                     
                                          </td>   
                                    
                                </tr>
                                <?php }?>
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