<?php 
    $open = "category";
    require "../../autoload/autoload.php";
    
    require "../../layouts/head.php";
    ?>

    <?php 
              $cate =  new Database();
              $data = $cate->fetchAll("Categories");
              // print_r($data);

              $id = getInput('id');
              
              $cate_edit = $cate->fetchID('Categories', $id);


              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = postInput("txtName");
                    $slug = to_slug(postInput("txtName"));

                $error =[];
              
                if ( postInput("txtName") == NULL) {
                    $error['name'] = 'Tên danh mục không được trống';
                }
                
                if (empty($error)) {
                        $result = $cate->update($name, $slug, $id) ;
                        if (isset($result)) {
                            $_SESSION['success'] = "Sửa danh mục thành công";
                            redirectAdmin("category");

                        } else {
                            $_SESSION['success'] = "Sửa danh mục thất bại";
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
                                <input type="text" class="form-control" placeholder="Tên danh mục" name="txtName" value="<?= $cate_edit['name'] ?>">
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