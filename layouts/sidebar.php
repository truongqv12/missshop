<?php
require_once "autoload/autoload.php";
$db = new Database();
?>

<div class="col-md-3 col-sm-3">
    <div class="main-left">
        <ul class="list-group">
            <li class="list-group-item-title">
                <h4 class="widget-title"><i class="fa fa-bars"></i> DANH MỤC SẢN PHẨM</h4>
            </li>
            <?php $cates = $db->fetchAll('categories') ?>
            <?php foreach ($cates as $item) : ?>
                <li class="list-group-item">
                    <a href="<?php base_url() ?>danh-muc.php?id=<?= $item['ID'] ?>" class=""> <?= $item['name'] ?></a>
                </li>
            <?php endforeach; ?>

        </ul>

        <!--end list-group-->
        <ul class="list-group">
            <li class="list-group-item-title">
                <h4 class="widget-title"><i class="fa fa-phone"></i> Hỗ TRỢ TRỰC TUYẾN</h4>
            </li>
            <div class="media">

                <div class="media-left col-md-2">
                    <img class="media-object img-responsive"
                         src="<?php base_url() ?>public/frontend/images/support-online.png"
                         alt="..." width="100%">
                </div>

                <div class="col-md-10">
                    <div class="media-body">
                        <p class="media-heading">Tư vấn bán hàng 1
                        0363207542</p>
                    </div>
                </div>
            </div>

            <!--end media-->

            <div class="media">

                <div class="media-left col-md-2">
                    <img class="media-object img-responsive" src="<?php base_url() ?>public/frontend/images/email.png"
                         alt="..."
                         width="100%">
                </div>

                <div class="col-md-10">
                    <div class="media-body">
                        <p class="media-heading">Email liên hệ</br>miss.shop@gmail.com</p>
                    </div>
                </div>
            </div>

            <!--end media-->
        </ul>
        <!--end list-group-->

        <ul class="list-group">
            <li class="list-group-item-title">
                <h4 class="widget-title"><i class="fa fa-black-tie"></i> SẢN PHẨM NỔI BẬT</h4>
            </li>


            <?php
            $sql = "SELECT * FROM products WHERE hot = 1 ORDER BY id DESC LIMIT 5";
            $pro_hot = $db->fetchsql($sql);
            ?>
            <?php foreach ($pro_hot as $item_pro) : ?>
                <div class="media">
                    <div class="media-left col-md-5">
                        <a href="<?php base_url() ?>danh-muc.php?id=<?= $item_pro['id'] ?>">
                            <img class="media-object img-responsive"
                                 src="<?php base_url() ?>public/uploads/products/<?php echo $item_pro['image'] ?>"
                                 alt="..." width="100%">
                        </a>
                    </div>

                    <div class="col-md-7">
                        <div class="media-body">
                            <a href="<?php base_url() ?>chitietsanpham.php?id=<?= $item_pro['id'] ?>" class="media-heading"><?php echo $item_pro['pro_name'] ?></a>
                            <p class="price"><?= number_format($item_pro['price'], 0, ",", "."); ?> đ</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


            <!--end media-->
        </ul>
        <!--end list-group-->

        <ul class="list-group">
            
            <li class="list-group-item-title">
                <h4 class="widget-title"><i class="fa fa-book"></i> TIN TỨC</h4>
            </li>
            
            <?php $news_sql = 'SELECT * FROM news ORDER BY id DESC LIMIT 3 ';
                $news = $db->fetchsql($news_sql);
            ?>
            
            <?php foreach ($news as $item):?>
            <div class="col-md-12 col-sm-6 list-post-sidebar">
                <div class="col-md-12 col-sm-6" style="margin-top:10px;">
                    <a href="<?php base_url() ?>chitiettintuc.php?id=<?= $item['id'] ?>"><img class="img-responsive" src="<?php base_url() ?>public/uploads/news/<?php echo $item['image']; ?>" alt=""
                            style="width: 100%; height: 140px"></a>
                </div>
                <a href="<?php base_url() ?>chitiettintuc.php?id=<?= $item['id'] ?>" class="title-post-sidebar"><?php echo $item['title']; ?></a>
            </div>
            <?php endforeach; ?>
            <!--list-post-sidebar-->

        </ul>
        <!--end list-group-->

    </div>
</div>