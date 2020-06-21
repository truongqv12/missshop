
<?php
    $open = "slide";
require "../../autoload/autoload.php";

require "../../layouts/head.php";
?>
<?php
$slide            = new Database();
$id               = getInput('id');
$slide_info       = $slide->fetchID('slides', $id);
$image_slide_info = "../../../public/uploads/slides/" . $slide_info['image'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $name = postInput("txtName");
    
    $error = array();
    
    if (postInput("txtName") == NULL) {
        $error['name'] = 'Tên slide không được trống';
    }
    if (!empty($_FILES['image']['name'])) {
        $image      = $_FILES['image']['name'];
        $image_name = time() . '.' . $image;
        if (file_exists($image_slide_info)) {
            unlink($image_slide_info);
        }
    } else {
        $image_name = $image_slide_info;
    }

    if ($name == $slide_info['name'] && empty($_FILES['image']['name'])) {
              $_SESSION['success'] = "Dữ liệu không thay đổi";
              redirectAdmin("slide");
    }
    
    if (empty($error)) {
        move_uploaded_file($_FILES['image']['tmp_name'], '../../../public/uploads/slides/' . $image_name);
        //         $result = $slide->insert('slides', $data);
        $result = $slide->update_slide($name, $image_name, $id);
        if (isset($result)) {
            $_SESSION['success'] = "Sửa  thành công";
            redirectAdmin("slide");
        } else {
            $_SESSION['success'] = "Sửa thất bại";
        }
        
    }
    
    
}


?>
<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <?php
require "../../layouts/header.php";
?>
       <!-- =============================================== -->
        <!-- Left side column. contains the sidebar -->
        <?php
require "../../layouts/sidebar.php";
?>
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
                    <li class="active">sửa</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tên Slide</label>
                                <input type="text" class="form-control" placeholder="Tên danh mục" name="txtName" value="<?= $slide_info['name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">HÌnh ảnh</label>
                                <img src="../../../public/uploads/slides/<?= $slide_info['image'] ?>" alt="" style="height:200px;width:350px" class="img-responsive"><br>
                                <input type="file" name="image">
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
    <?php
require "../../layouts/footer.php";
?>

