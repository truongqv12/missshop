<?php

    require "../../autoload/autoload.php";
    $db = new Database();
    $id = getInput('id');
    $data = $db->fetchID('orders', $id);
    if (empty($data)) {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin('order');
    }

    if ($data['status'] == 1) {
        $_SESSION['error'] = "Đơn hàng đã được xử lý rồi";
        redirectAdmin('order');
    }

    $status = 1;

    $update = $db->update_status("orders",$status,$id);
    if ($update > 0) {
        $_SESSION['success'] = "Cập nhật thành công";

        //tru so luong san pham
        $sql = "SELECT pro_id, qty FROM order_detail WHERE oder_id = $id";
        $order = $db->fetchsql($sql);
        foreach ($order as $item) {
            $id_pro = intval($item['pro_id']);

            $product = $db->fetchID("products",$id_pro);

            $number = $product['qty'] - $item['qty'];
            $pay = $product['pay']+1;
            $sql_update = "UPDATE products SET qty = $number, pay = $pay WHERE id = $id_pro";
            $pro_update = $db->query($sql_update);
        }


        redirectAdmin('order');
    } else{
        $_SESSION['error'] = "Cập nhật không thành công";
        redirectAdmin('order');
    }
?>
