<?php

require_once "autoload/autoload.php";

$db = new Database();
//if (!isset($_SESSION['customer_name'])) {
//    echo "<script>alert('Bạn phải đăng nhập mới thực hiện được chức năng này');location.href='index.php'</script>";
//
//} else {
$id = intval(getInput('id'));
//    echo   $_SESSION['color'] ;
$color = $_POST['color'];
$product = $db->fetchID('products', $id);
if (!isset($_SESSION['cart'][$id])) {

    $_SESSION['cart'][$id]['name'] = $product['pro_name'];
    $_SESSION['cart'][$id]['image'] = $product['image'];
    $_SESSION['cart'][$id]['price'] = $product['price'];
    $_SESSION['cart'][$id]['color'] = $_POST['color'];
    if (isset($_POST['qty']) && $_POST['qty'] > 0) {
        $qty = $_POST['qty'];
        $_SESSION['cart'][$id]['qty'] = $qty;
    } else if (!isset($_POST['qty'])) {
        $_SESSION['cart'][$id]['qty'] = 1;
    }
}
else {
    $_SESSION['cart'][$id]['qty'] += 1;
}

    echo "<script>alert('Đặt hàng thành công');location.href='gio-hang.php'</script>";
