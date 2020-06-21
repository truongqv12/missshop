<?php
require_once "autoload/autoload.php";
$db = new Database();
?>
<footer class="container-fluid">
    <div class="container page-footer">
        <div class="col-xs-12 col-sm-6 col-md-3">
            <h5 class="footer-title"><?php echo strtoupper('Miss Shop') ?></h5>
            <ul class="list-group">
                <li class="list-group-item"><i class="fa fa-map-marker"></i> Trụ sở chính: 134 Thượng đình, thanh Xuân, Hà Nội.
                </li>
                <li class="list-group-item"><i class="fa fa-phone"></i> 0363207542</li>
                <li class="list-group-item"><i class="fa fa-at"> miss.shop@gmail.com</i></li>
            </ul>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3">
            <h5 class="footer-title">HỖ TRỢ KHÁCH HÀNG</h5>
            <ul class="list-group">
                <li class="list-group-item"><i class="fa fa-caret-right"></i> Chính Sách Đổi Trả Hàng</li>
                <li class="list-group-item"><i class="fa fa-caret-right"></i> Điều khoản dịch vụ</li>
                <li class="list-group-item"><i class="fa fa-caret-right"> miss.shop@gmail.com</i></li>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <h5 class="footer-title">DANH MỤC SẢN PHẨM</h5>
            <?php $cates = $db->fetchAll('categories') ?>
            <ul class="list-group">
                <?php foreach ($cates as $item) : ?>
                <li class="list-group-item" style="margin: -10px"> 
                        <a href="<?php base_url() ?>danh-muc.php?id=<?= $item['ID'] ?>" class=""><i class="fa fa-caret-right"></i> <?= $item['name'] ?></a>

                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

<div class="back-to-top show">
    <i class="fa  fa-angle-up"></i>
</div>
</footer>

<div class="page-footer-copyright container-fluid">
    <!--<div class="page-footer-copyright">-->
    Copyright © 2019 - Bùi Thị Thu.
    <!--</div>-->
</div>

<script src="<?php base_url() ?>public/frontend/js/jquery.js"></script>
<script src="<?php base_url() ?>public/frontend/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(".back-to-top").click(function() {
     $("html, body").animate({ scrollTop: 0 }, "slow");
     return false;
});
</script>
</body>
</html>
