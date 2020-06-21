<?php
$open = "product";
require "../../autoload/autoload.php";

require "../../layouts/head.php";
?>
<?php
$db =  new Database();
$cates = $db->fetchAll('categories');
$id               = intval(getInput('id'));
$pro_info       = $db->fetchID('products', $id);
$path = $_SERVER['SCRIPT_NAME'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $error =[];

    if ( postInput("txtName") == NULL) {
        $error['name'] = 'Tên danh mục không được trống';
    } else {
        $name = postInput("txtName");
        $slug = to_slug(postInput('txtName'));
    }
    if ( postInput("stlCate") == NULL) {
        $error['stlCate'] = 'Danh mục sản phẩm không được trống';
    } else {
        $cate_id = postInput("stlCate");
    }


    if ( postInput("price") == NULL) {
        $error['price'] = 'Gía sản phẩm không được trống';
    } else {
        $price = postInput("price");
    }

    if ( postInput("size") == NULL) {
        $error['size'] = 'size sản phẩm không được trống';
    }  else {
        $size = postInput("size");
    }


    if ( postInput("qty") == NULL) {
        $error['qty'] = 'Số lượng sản phẩm không được trống';
    } else {
        $qty = postInput("qty");
    }


    if ( postInput("color") == NULL) {
        $error['color'] = 'Màu sản phẩm không được trống';
    } else {
        $color = postInput("color");
    }

    if ( postInput("description") == NULL) {
        $error['description'] = 'Miêu tả sản phẩm không được trống';
    }  else {
        $description = postInput("description");
    }




    if (empty($error)) {
        if ($_FILES['image']['size'] == '') {
            $file_name = $pro_info['image'];
        }

        else{

            $file_name = time().$_FILES['image']['name'];
            unlink('../../../public/uploads/products/'.$pro_info['image']);
            move_uploaded_file($_FILES['image']['tmp_name'],'../../../public/uploads/products/'.$file_name);
        }

        $sql = "UPDATE products SET cate_id = $cate_id, pro_name = '$name', slug = '$slug', qty = $qty, image = '$file_name', 
        price = $price, description = '$description', size = '$size', color = '$color' WHERE id = $id";
        $result = $db->query($sql);
        $pro_id =  $id;

        if (isset($_FILES['images_detail']['name'])) {
            $img = $_FILES['images_detail'];
        }
        if(!empty($img))
        {
            $img_desc = reArrayFiles($img);

            $id_pro = $pro_id;


            foreach($img_desc as $val)
            {
                if ($val['size'] > 0) {
                    $newname = date('YmdHis', time()) . mt_rand() . '.jpg';
                    move_uploaded_file($val['tmp_name'], '../../../public/uploads/products/details/' . $newname);
                    $db ->insert_img_pro($newname, $id_pro);
                }
            }
        }
        $_SESSION['success'] = "Sửa thành công";
       redirectAdmin("product");


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
                Sản phẩm
                <small>Sửa</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Sản phẩm</a></li>
                <li class="active">Sửa</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Danh mục </label>
                            <select class="form-control" name="stlCate">
                                <option value="">Chọn danh mục</option>
                                <?php foreach ($cates as $item) :?>
                                    <option value="<?= $item['ID'] ?>" <?php echo $pro_info['cate_id'] == $item['ID'] ? "selected":"" ?>><?= $item['name'] ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên Sản phẩm</label>
                            <input type="text" class="form-control" placeholder="Tên sản phẩm" name="txtName" value="<?= $pro_info['pro_name'] ?>">
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Giá Sản phẩm</label>
                                    <input type="text" class="form-control" placeholder="Tên sản phẩm" name="price" value="<?= $pro_info['price'] ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số lượng</label>
                                    <input type="text" class="form-control" placeholder="Số lượng" name="qty" value="<?= $pro_info['qty'] ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">size</label>
                                    <input type="text" class="form-control" placeholder="size" name="size" value="<?= $pro_info['size'] ?>">

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Màu</label>
                                    <input type="text" class="form-control" placeholder="Màu" name="color" value="<?= $pro_info['color'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Miêu tả</label>
                                    <textarea class="form-control" name="description" id="description" cols="50" rows="10">
                                        <?= $pro_info['description'] ?>
                                    </textarea>
                                    <script>

                                        CKEDITOR.replace('description');

                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="" class="text-inline">Nổi bật</label>
                                    <label class="checkbox-inline"><input type="radio" value="1" name="hot"
                                         <?php if ($pro_info['hot'] == 1) echo "checked"?>
                                        > Có </label>
                                    <label class="checkbox-inline"><input type="radio" <?php if ($pro_info['hot'] == 0) echo "checked"?> value="0" name="hot"> Không</label>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">HÌnh ảnh</label><br>
                                    <img class="img-responsive" src="../../../public/uploads/products/<?= $pro_info['image'] ?>" alt="" style="height:200px;width:300px"><br>
                                    <input type="file" name="image">

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">HÌnh ảnh chi tiết</label><br>
                                    <?php
                                        $sql = "SELECT * FROM pro_img WHERE pro_id = $id";
                                        $img_detail = $db->fetchsql($sql);
                                    ?>
                                <div class="row">
                                    <?php foreach ($img_detail as $item_img): ?>
                                    <div class="col-md-3">
                                        <img class="img-responsive" src="../../../public/uploads/products/details/<?= $item_img['links'] ?>" alt="" style="height:150px;width:100%"><br>

                                        <a class="fa fa-times-circle delete_img_detail" href="delete-img-details.php?id=<?php echo $item_img['id'] ?>&pro_id=<?php echo $pro_info['id'] ?> " ></a>
                                    </div>
                                    <?php endforeach; ?>
                                </div>

                                </div>

                                <div class="form-group">
                                    <button type="button" class="btn btn-success" id="btn_add_img">Thêm ảnh chi tiết</button>
                                </div>

                                <p id="append_img"></p
                            </div>
                                <div class="clearfix"></div>
                            <button type="submit" class="btn btn-primary">Lưu lại</button>
                        </div>

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
