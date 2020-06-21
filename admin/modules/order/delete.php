<?php
require "../../autoload/autoload.php";

require "../../layouts/head.php";

$db = new Database();
$id = $_GET['id'];
$sql_order_detail = "SELECT * FROM order_detail WHERE oder_id = $id";
$order_detail = $db->fetchsql($sql_order_detail);
foreach ($order_detail as $item_order_detail) {
    $item_order_detail_id =  $item_order_detail['id'];
     $db->delete("order_detail", $item_order_detail_id);
}

$result = $db->delete("orders", $id);
if (isset($result)) {
    $_SESSION['success'] = "Xóa thành công";
    redirectAdmin("order");
} else {
    $_SESSION['error'] = "Xóa thất bại";
    redirectAdmin("order");
}


?>

