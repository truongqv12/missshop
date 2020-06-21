<?php

require "../../autoload/autoload.php";
$db = new Database();
$id = getInput('id');
$data = $db->fetchID('products', $id);
if (empty($data)) {
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin('products');
}


$hot = $data['hot'] == 0 ? 1 : 0;
$sql = "UPDATE products SET hot = $hot WHERE id = $id";
$update = $db->query($sql);
if ($update > 0) {
    $_SESSION['success'] = "Cập nhật thành công";
    redirectAdmin('product');
}

?>
