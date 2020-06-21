<?php 
    $open = "category";
    require "../../autoload/autoload.php";
    
    require "../../layouts/head.php";
    ?>

    <?php 
              $cate =  new Database();
              $data = $cate->fetchAll("Categories");

              if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
                $datas = [
                    "name" => postInput("txtName"),
                    "slug" => to_slug(postInput("txtName"))
                ];

                
                $error =[];
              
                if ( postInput("txtName") == NULL) {
                    $error['name'] = 'Tên danh mục không được trống';
                }
                
                if (empty($error)) {

                    $isset = $cate->fetchOne("Categories", "name = '".$datas['name']."'");
                    if (count($isset) > 0) {
                        $_SESSION['error'] = "Tên danh mục đã tồn tại";
                    } else {
                        $result = $cate->insert('Categories', $datas);
                        if (isset($result)) {
                            $_SESSION['success'] = "Thêm mới thành công";
                            redirectAdmin("category");
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
                    Danh mục
                    <small>Thêm</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Danh mục</a></li>
                    <li class="active">Thêm</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tên danh mục</label>
                                <input type="text" class="form-control" placeholder="Tên danh mục" name="txtName">
                                <?php
                                    if (isset($error['name'])) echo"<p class='text-danger'>".$error['name'];
                                ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu lại</button>
                        </form>
                    </div>
                </div>
        </div>
        <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php require "../../layouts/footer.php" ?>