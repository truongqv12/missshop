<?php 
    $open = "slide";
    require "../../autoload/autoload.php";
    
    require "../../layouts/head.php";
    ?>

    <?php 
              $slide =  new Database();
             
              // print_r($data);

              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                   $image=$_FILES['image']['name'];          
                   $image_name=time().'.'.$image;

                   $data = [
                            "name" => postInput("txtName"),
                            "image" => $image_name
                            
                 ];

                 $error =[];
              
                 if ( postInput("txtName") == NULL) {
                     $error['name'] = 'Tên slide không được trống';
                 }
                 if (empty($_FILES['image']['name'])){
                     $error['image'] = "Bạn chưa chon file";                     
                 }

                 if (empty($error)) {
                      move_uploaded_file($_FILES['image']['tmp_name'], '../../../public/uploads/slides/'.$image_name);
                      $result = $slide->insert('slides', $data);
                      if (isset($result)) {
                            $_SESSION['success'] = "Thêm mới thành công";
                            redirectAdmin("slide");
                        } else {
                            $_SESSION['success'] = "Thêm mới thất bại";
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
                    <li><a href="#">Slide</a></li>
                    <li class="active">Thêm</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="">Tên Slide</label>
                                <input type="text" class="form-control" placeholder="Tên danh mục" name="txtName" value="<?= old('txtName') ?>">
                                <?php if (isset($error['name'])) {
                                      echo "<p class='text-danger'>$error[name].</p>";
                                } ?>
                            </div>

                            <div class="form-group">
                                <label for="">HÌnh ảnh</label>
                                <input type="file" name="image">
                                <?php if (isset($error['image'])) {
                                      echo "<p class='text-danger'>$error[image].</p>";
                                } ?>
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