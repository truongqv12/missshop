<?php
$open = "news";
require "../../autoload/autoload.php";

require "../../layouts/head.php";
?>

<?php
$db = new Database();
$id = getInput('id');
$news_info = $db->fetchID('news', $id);
$image_news_info = "../../../public/uploads/news/" . $news_info['image'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $title = postInput("txtName");

    $error = array();

    if (postInput("txtName") == NULL) {
        $error['name'] = 'Tên slide không được trống';
    }

    if (postInput("content") == NULL) {
        $error['content'] = 'Nội dung bài viết không được trống';
    } else {
        $content = postInput("content");
    }
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $image_name = time() . '.' . $image;
        if (file_exists($image_news_info)) {
            unlink($image_news_info);
        }
    } else {
        $image_name = $image_news_info;
    }


    if (empty($error)) {
        move_uploaded_file($_FILES['image']['tmp_name'], '../../../public/uploads/news/' . $image_name);

        $sql = "UPDATE news SET title = '$title', image = '$image_name', content = '$content' WHERE id = $id";
        
        $result = $db->query($sql);
        if (isset($result)) {
            $_SESSION['success'] = "Sửa  thành công";
            redirectAdmin("news");
        } else {
            $_SESSION['success'] = "Sửa thất bại";
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
                    <small>sửa</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Bài viết</a></li>
                    <li class="active">sửa</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="">Tiêu đề</label>
                                <input type="text" class="form-control" placeholder="Tiêu đề bài viết" name="txtName" value="<?= $news_info['title'] ?>">
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
                                            <?= $news_info['content'] ?>
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
                                <img src="../../../public/uploads/news/<?= $news_info['image'] ?>" alt="" style="height:200px;width:350px" class="img-responsive"><br>

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