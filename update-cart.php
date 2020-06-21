<?php
    require_once "autoload/autoload.php";
    $db= new Database();
    $key = intval(getInput('key'));
    $qty = intval(getInput('qty'));
//    $qty_pro = $_SESSION['cart'][$key];
//    $result_qty = $db->fetchID("products", $qty_pro);
//    $qty_pro1 = $result_qty['qty'];
//    if ($qty > $qty_pro1) {
//        echo 0;
//    } else {
        $_SESSION['cart'][$key]['qty'] = $qty;
        echo 1;
//    }


?>