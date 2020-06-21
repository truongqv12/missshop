<?php
require "../../autoload/autoload.php";

require "../../layouts/head.php";

$user = new Database();
$id = $_GET['id'];

    $result = $user->delete("customers", $id);
    if (isset($result)) {
        $_SESSION['success'] = "Xóa thành công";
        redirectAdmin("user");
    } else {
        $_SESSION['error'] = "Xóa thất bại";
    }
    redirectAdmin("user");

?>
