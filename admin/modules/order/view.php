
<?php 
    $id = $_POST['id'];
    
?>
<div id="modal-view-order" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thông tin đơn hàng</h4>
            </div>
            <div class="modal-body">
                
                    <h4>Tên Khách hàng: <?=$_POST['name']; ?></h4>
                    <h4>Số điện thoại : <?= $_POST['phone']; ?></h4>
                    <h4>Tổng tiền : <?= $_POST['price'];?></h4>
                   
                    <h5>Địa chỉ: <?php echo $_POST['address'] ?></h5>
                  
               

              

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
