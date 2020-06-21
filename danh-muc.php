<?php
require_once "autoload/autoload.php";
    $db = new Database();

    if (isset($_GET['p'])) {
        $p = $_GET['p'];
    } else {
        $p = 1;
    }

    $id = getInput('id');
    $sql = "SELECT * FROM products WHERE cate_id = $id ORDER BY ID DESC " ;
    $cate = $db->fetchID('categories', $id);

    $total = count($db->fetchsql($sql));

    $products = $db->fetchJones("products",$sql,$total,$p,8,true);
//var_dump($data);
    $total_page = $products['page'];
    unset($products['page']);
$path = $_SERVER['SCRIPT_NAME'];
?>
<?php include "layouts/head.php"?>
<title>Miss Shop | Danh mục</title>
<body>
<div class="wrapper">
    <?php include "layouts/header.php"?>
    <!--end header-menu-fluid-->

    <div class="container">
        <div class="main">
            <?php include "layouts/slide.php"?>
            <!--end slide -->

            <div class="main-container">
                <div class="row">
                    <?php include "layouts/sidebar.php"?>

                    <div class="col-md-9 col-sm-9">
                        <div class="main-right">
                            <div class="shop-homepage">
                                <div class="filter-title-product">
                                    <a href=""><?= $cate['name'] ?></a>

                                </div>
                                <div class="list-product">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <?php foreach ($products as $item): ?>

                                                <div class="col-md-3 col-sm-6 col-xs-6">
                                                    <div class="item-product">
                                                        <div class="img-product img-responsive">
                                                            <a href="chitietsanpham.php?id=<?= $item['id']?>"><img class="img-responsive" src="<?php base_url() ?>public/uploads/products/<?= $item['image']; ?>" alt="" height="100%" title="<?php echo $item['pro_name'] ?>"></a>
                                                        </div>
                                                        <div class="name-product">
                                                            <a href="chitietsanpham.php?id=<?= $item['id']?>" title="<?php echo $item['pro_name'] ?>"><?php echo $item['pro_name'] ?></a>
                                                        </div>

                                                        <p class="price-product"><?php echo number_format($item['price'],0,",",".") ; ?> đ</p>



                                                    </div>
                                                </div>
                                            <?php endforeach;?>
                                        </div>

                                        <?php if ($total > 8):  ?>
                                        <div style="text-align: center">
                                            <nav aria-label="...">
                                                <ul class="pagination">
                                                    <?php if (isset($_GET['p']))$prev= $_GET['p'] - 1; ?>
                                                    <li class="page-item <?php if ($_GET['p'] ==1 ) echo "disabled"?>   ">
                                                        <a class="page-link" <?php if (isset($_GET['p']) && $_GET['p'] > 1) echo "href='&&p=$prev'"?>>Previous</a>
                                                    </li>
                                                    <?php for ($i = 1; $i <= $total_page; $i++):?>
                                                        <?php
                                                        if (isset($_GET['p'])&& $_GET['p'] == $i) {
                                                            $active = "active";
                                                        } else{
                                                            $active = "";
                                                        }

                                                        ?>
                                                        <li class="page-item <?php echo $active?>"><a class="page-link" href="<?php echo $path?>?id=<?php echo $id ?>&p=<?= $i ?>"><?= $i?></a></li>
                                                    <?php endfor?>
                                                    <li class="page-item  <?php if ($_GET['p'] == $total_page) echo "disabled"?> ">
                                                        <?php if (isset($_GET['p']))$next= $_GET['p'] + 1; ?>
                                                        <a class="page-link" <?php if (isset($_GET['p']) && $_GET['p'] < $total_page) echo "href='?p=$next'"?>>Next</a>

                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                         <?php endif; ?>
                                    </div>

                                </div>
                            </div>
                            <!--end shop-home-page-->
                        </div>
                    </div>
                </div>
                <!--end main-container-->
            </div>
            <!--end main-->
        </div>
        <!--end container-->
    </div>

    <?php require "layouts/footer.php" ?>
    <script src="<?php base_url() ?>public/frontend/js/jquery.min.js"></script>
    <?php if(!isset($_GET['p'])){
        echo '<script>
        $(".pagination li:nth-child(2)").addClass("active");
    </script>';
    } ?>
    <!-- /.content-wrapper -->

