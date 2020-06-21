<?php
$id = $_POST["data_id"];
// lấy thông tin sản phẩm ra đổ vao modal bên dưới
//        $products = new Database();
?>
<div id="modal-view-pro" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thông tin sản phẩm</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <h4>Tên sản phẩm: <?php echo $_POST['name']; ?></h4>
                    <div class="col-md-6">
                        <img src="<?php echo $_POST['image'];?>" alt="" width="250px" height="200px">

                    </div>
                    <div class="col-md-6">
                        Số lượng: <?php echo $_POST['qty']; ?><br><br>
                        Size: <?php echo $_POST['size']; ?><br><br>
                        Màu: <?php echo $_POST['color']; ?><br><br>
                        Gía: <?php echo $_POST['price']; ?><br><br>
                    </div>
                </div>

                <br><br>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <h4 style="padding-top: 10px">Miêu tả</h4>
                    <?= $_POST['description'] ?>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

