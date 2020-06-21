<?php
require "../../autoload/autoload.php";

require "../../layouts/head.php";

$db = new Database();
$id = $_GET['id'];
$pro_id = $_GET['pro_id'];
$image_info = $db->fetchID('pro_img', $id);
$path="../../../public/uploads/products/details/".$image_info["links"];
if (file_exists($path)) {
    unlink($path);
}

$result = $db->delete("pro_img", $id);


if (isset($result)) {
    header("Location:edit.php?id=$pro_id");
} else {
    $_SESSION['error'] = "Xóa thất bại";
}


?>
