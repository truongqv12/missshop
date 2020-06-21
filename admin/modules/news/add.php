<?php
$open = "news";
require "../../autoload/autoload.php";

require "../../layouts/head.php";
?>

<?php
$db = new Database();

// print_r($data);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $image = $_FILES['image']['name'];
    $image_name = time() . '.' . $image;
    $content = postInput('content');
    $data = [
        "title" => postInput("txtName"),
        "image" => $image_name,
        "content" => $content
    ];

    $error = [];

    if (postInput("txtName") == NULL) {
        $error['name'] = 'Tiêu đề không được trống';
    }
    if (postInput("content") == NULL) {
        $error['content'] = 'Nội dung bài viết không được trống';
    }
    if (empty($_FILES['image']['name'])) {
        $error['image'] = "Bạn chưa chon file";
    }

    if (empty($error)) {
        move_uploaded_file($_FILES['image']['tmp_name'], '../../../public/uploads/news/' . $image_name);
        $result = $db->insert('news', $data);
        if (isset($result)) {
            $_SESSION['success'] = "Thêm mới thành công";
            redirectAdmin("news");
        } else {
            $_SESSION['error'] = "Thêm mới thất bại";
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
                    Bài viết
                    <small>Thêm</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Bài viết</a></li>
                    <li class="active">Thêm</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="">Tiêu đề</label>
                                <input type="text" class="form-control" placeholder="Tiêu đề bài viết" name="txtName" value="<?= old('txtName') ?>">
                                <?php
                                if (isset($error['name'])) {
                                    echo "<p class='text-danger'>$error[name].</p>";
                                }
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Nội dung</label>
                                        <textarea class="form-control" name="content" id="content" cols="50" rows="10">
                                            <?= old('content') ?>
                                        </textarea>
                                        <?php
                                        if (isset($error['content']))
                                            echo"<p class='text-danger'>" . $error['content'];
                                        ?>
                                        <script>

                                            CKEDITOR.replace('content');

                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">HÌnh ảnh</label>
                                <input type="file" name="image">
                                <?php
                                if (isset($error['image'])) {
                                    echo "<p class='text-danger'>$error[image].</p>";
                                }
                                ?>
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