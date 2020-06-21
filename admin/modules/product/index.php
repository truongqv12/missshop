<?php

$open = "product";
require "../../autoload/autoload.php";

require "../../layouts/head.php";
?>

<?php
$products = new Database();
if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 1;
}


$sql = "SELECT products.id, products.cate_id, products.pro_name, products.qty, products.image, products.price, products.hot, products.active, products.description, products.size, products.color, categories.name
                FROM products
                INNER JOIN categories ON products.cate_id = categories.id";
$total = $products->countTable("products");

$data = $products->fetchJones("products", $sql, $total, $p, 5, true);

$total_page = $data['page'];
unset($data['page']);

$path = $_SERVER['SCRIPT_NAME'];

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
                <small>danh sách</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Sản phẩm</a></li>
                <li class="active">Danh sách</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box">

                <div class="box-body">
                    <?php require_once '../../../partials/notification.php'; ?>
                    <a href="<?php echo modules('product') ?>/add.php" class="btn btn-primary pull-right">Create</a><br><br>
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th style="width: 10px">ID</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Số lượng</th>
                            <th>Gía</th>
                            <th>Nổi bật</th>
                            <th>Hiển thị</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($data as $item) {
                            ?>
                            <tr>
                                <td><?= $item["id"] ?></td>
                                <td style="width: 200px">

                                    <img class="img-responsive"
                                         src="../../../public/uploads/products/<?= $item['image'] ?>" alt=""
                                         style="height:120px;width:180px">

                                </td>

                                <td class="col-md-2" name="<?= $item["pro_name"] ?>"><?= $item["pro_name"] ?></td>

                                <td class="col-md-2"><?= $item['name'] ?></td>
                                <td class="qty" style="width: 30px"
                                    qty_pro= <?= $item["qty"] ?>><?= $item["qty"] ?></td>
                                <td class="price"><?= number_format($item["price"], 0, ",", ".") ?> đ</td>
                                <td>
                                    <a href="noi-bat.php?id=<?= $item['id'] ?>"
                                       class="<?php echo $item['hot'] == 0 ? "btn-xs btn-danger" : "btn-xs btn-info"; ?>">
                                        <?php echo $item['hot'] == 0 ? "Không" : "Có"; ?>
                                    </a>
                                </td>

                                    <input type="hidden" class="size" value="<?= $item['size'] ?>">

                                <input type="hidden" class="color" value="<?= $item['color'] ?>">

                                <input type="hidden" class="description	" value="<?= $item['description'] ?>">

                                <td>
                                    <a href="hienthi.php?id=<?= $item['id'] ?>"
                                       class="<?php echo $item['active'] == 0 ? "btn-xs btn-danger" : "btn-xs btn-info"; ?>">
                                        <?php echo $item['active'] == 0 ? "Không" : "Có"; ?>
                                    </a>
                                </td>
                                <td>

                                    <a href="#" class="glyphicon glyphicon-eye-open view_pro btn btn-xs btn-primary"
                                       id_pro="<?= $item['id'] ?>">Xem</a>
                                    | <a href="<?php echo modules('product') ?>/edit.php?id=<?= $item["id"] ?>"><i
                                                class="fa fa-edit"></i> Edit</a>
                                    | <a onclick="return confirm('Bạn chắc chắn xoa ?')"
                                         href="<?php echo modules('product') ?>/delete.php?id=<?= $item["id"] ?>"  class="btn btn-xs btn-danger"><i
                                                class="fa fa-trash"></i> Delete</a>

                                </td>

                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <div style="text-align: center">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <?php if (isset($_GET['p'])) $prev = $_GET['p'] - 1; ?>
                                <li class="page-item <?php if ($_GET['p'] == 1) echo "disabled" ?>   ">
                                    <a class="page-link" <?php if (isset($_GET['p']) && $_GET['p'] > 1) echo "href='?p=$prev'" ?>>Previous</a>
                                </li>
                                <?php for ($i = 1; $i <= $total_page; $i++): ?>
                                    <?php
                                    if (isset($_GET['p']) && $_GET['p'] == $i) {
                                        $active = "active";
                                    } else {
                                        $active = "";
                                    }

                                    ?>
                                    <li class="page-item <?php echo $active ?>"><a class="page-link"
                                                                                   href="?p=<?= $i ?>"><?= $i ?></a>
                                    </li>
                                <?php endfor ?>
                                <li class="page-item  <?php if ($_GET['p'] == $total_page) echo "disabled" ?> ">
                                    <?php if (isset($_GET['p'])) $next = $_GET['p'] + 1; ?>
                                    <a class="page-link" <?php if (isset($_GET['p']) && $_GET['p'] < $total_page) echo "href='?p=$next'" ?>>Next</a>

                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="frame-modal"></div>
                </div>
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <?php if (!isset($_GET['p'])) {
        echo '<script>
        $(".pagination li:nth-child(2)").addClass("active");
    </script>';
    } ?>
    <!-- /.content-wrapper -->
    <?php require "../../layouts/footer.php" ?>

