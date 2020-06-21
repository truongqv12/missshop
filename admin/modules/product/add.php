<?php 
        $open = "product";
    require "../../autoload/autoload.php";
    
    require "../../layouts/head.php";
    ?>
<?php 
    $product =  new Database();
    $datas = $product->fetchAll('categories');
//chen anh chi tiet

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $image=$_FILES['image']['name'];
        $image_name=time().'.'.$image;

        $data = [
            "cate_id" => postInput('stlCate'),
            "pro_name" => postInput('txtName'),
            "slug" => to_slug(postInput('txtName')),
            "qty" => postInput('qty'),
            "image" => $image_name,
            "price" => postInput('price'),
            "hot" => postInput('hot'),
            "description" => postInput('description'),
            "size" => postInput('size'),
            "color" => postInput('color'),

        ];
      $error =[];


        if ( postInput("stlCate") == NULL) {
            $error['stlCate'] = 'Danh mục sản phẩm không được trống';
        }

      if ( postInput("txtName") == NULL) {
          $error['name'] = 'Tên sản phẩm không được trống';
      }
        if ( postInput("price") == NULL) {
            $error['price'] = 'Gía sản phẩm không được trống';
        }

        if ( postInput("size") == NULL) {
            $error['size'] = 'size sản phẩm không được trống';
        }

        if ( postInput("qty") == NULL) {
            $error['qty'] = 'Số lượng sản phẩm không được trống';
        }
        if ( postInput("color") == NULL) {
            $error['color'] = 'Màu sản phẩm không được trống';
        }

        if ( postInput("description") == NULL) {
            $error['description'] = 'Miêu tả sản phẩm không được trống';
        }

      if ($_FILES['image']['name'] == null){
            $error['image'] = "Bạn chưa chon file";
        }
      
      if (empty($error)) {
          move_uploaded_file($_FILES['image']['tmp_name'], '../../../public/uploads/products/'.$image_name);

          $result = $product->insert('products', $data);
          $pro_id =  $result;

          $img = $_FILES['images_detail'];
              if(!empty($img))
              {
                  $img_desc = reArrayFiles($img);

                  $id_pro = $pro_id;


                  foreach($img_desc as $val)
                  {
                      if ($val['size'] > 0) {
                          $newname = date('YmdHis', time()) . mt_rand() . '.jpg';
                          move_uploaded_file($val['tmp_name'], '../../../public/uploads/products/details/' . $newname);
                          $product->insert_img_pro($newname, $id_pro);
                      }
                  }
              }
          $_SESSION['success'] = "Thêm mới thành công";
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
                    <small>Thêm</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Sản phẩm</a></li>
                    <li class="active">Thêm</li>
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
                                    <?php foreach ($datas as $item) :?>
                                        <option value="<?= $item['ID'] ?>" <?php echo old('stlCate') == $item['ID'] ? "selected":"" ?>><?= $item['name'] ?></option>
                                    <?php endforeach;?>
                                </select>
                                <?php
                                if (isset($error['stlCate'])) echo"<p class='text-danger'>".$error['stlCate'];
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tên Sản phẩm</label>
                                <input type="text" class="form-control" placeholder="Tên sản phẩm" name="txtName" value="<?php echo old('txtName') ?>">
                                <?php
                                if (isset($error['name'])) echo"<p class='text-danger'>".$error['name'];
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Giá Sản phẩm</label>
                                        <input type="text" class="form-control" placeholder="Gía sản phẩm" name="price" value="<?= old('price')?>">
                                        <?php
                                        if (isset($error['price'])) echo"<p class='text-danger'>".$error['price'];
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Số lượng</label>
                                        <input type="text" class="form-control" placeholder="Số lượng" name="qty" value="<?= old('qty')?>">
                                        <?php
                                        if (isset($error['qty'])) echo"<p class='text-danger'>".$error['qty'];
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">size</label>
                                        <input type="text" class="form-control" placeholder="size" name="size" value="<?= old('size')?>">
                                        <?php
                                        if (isset($error['size'])) echo"<p class='text-danger'>".$error['size'];
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Màu</label>
                                        <input type="text" class="form-control" placeholder="Màu" name="color" value="<?= old('color')?>">
                                        <?php
                                        if (isset($error['color'])) echo"<p class='text-danger'>".$error['color'];
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Miêu tả</label>
                                        <textarea class="form-control" name="description" id="description" cols="50" rows="10">
                                            <?= old('description') ?>
                                        </textarea>
                                        <?php
                                        if (isset($error['description'])) echo"<p class='text-danger'>".$error['description'];
                                        ?>
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
                                        <label class="checkbox-inline"><input type="radio" value="1" name="hot"> Có </label>
                                        <label class="checkbox-inline"><input type="radio" checked value="0" name="hot"> Không</label> 
                                    </div>

                                    <div class="form-group">
                                          <label for="exampleInputFile">HÌnh ảnh</label>
                                          <input type="file" name="image">
                                        <?php
                                        if (isset($error['image'])) echo"<p class='text-danger'>".$error['image'];
                                        ?>

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