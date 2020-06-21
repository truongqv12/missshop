<?php
require_once "autoload/autoload.php";
$db = new Database();
$id = $_GET['id'];
?>

<?php include "layouts/head.php" ?>
<title>Miss Shop | Chi tiết tin tức</title>
<body>
    <div class="wrapper">
        <?php include "layouts/header.php" ?>
        <!--end header-menu-fluid-->

        <div class="container">
            <div class="main">

                <div class="main-container">
                    <div class="row">
                        <?php include "layouts/sidebar.php" ?>

                        <div class="col-md-9 col-sm-9">
                            <div class="main-right">

                                <div class="shop-homepage" style="padding: 10px">
                                    <?php $news = $db->fetchID("news", $id); ?>
                                    <h3 style="color: #EA4242;font-weight: bold;padding: 10px 0px;"><?php echo $news['title'] ?></h3>
                                    <img src="<?php echo base_url()?>/public/uploads/news/<?php echo $news['image']?>">
                                    <p>
                                        <?php echo $news['content'] ?>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--end main-container-->
                </div>
                <!--end main-->
            </div>
            <!--end container-->
        </div>

        <?php include "layouts/footer.php" ?>

