<?php
require "../../autoload/autoload.php";

require "../../layouts/head.php";

$db = new Database();
$pro_id = $_GET['id'];

$pro_info = $db->fetchID('products', $pro_id);
//$path = "../../../public/uploads/products/" . $pro_info["image"];
//if (file_exists($path)) {
//    unlink($path);
//}
$sql = "SELECT * FROM pro_img WHERE pro_id = $pro_id";
$img_detail_pro = $db->fetchsql($sql);
foreach ($img_detail_pro as $item_img) {
    $image_detail = $item_img["links"];
    $path_img_detail = "../../../public/uploads/products/details/" .$image_detail;

    if (file_exists($path_img_detail)) {
        unlink($path_img_detail);
    }
    $result_img_detail = $db->delete("pro_img", $item_img['id']);

}



$result_product = $db->delete("products", $pro_id);
$_SESSION['success'] = "Xóa thành công";
redirectAdmin("product");