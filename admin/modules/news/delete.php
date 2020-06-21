<?php

require "../../autoload/autoload.php";

require "../../layouts/head.php";

$db = new Database();
$id = $_GET['id'];
$news_info = $db->fetchID('news', $id);
$path = "../../../public/uploads/news/" . $news_info["image"];
if (file_exists($path)) {
    unlink($path);
}

$result = $db->delete("news", $id);

if (isset($result)) {
    $_SESSION['success'] = "Xóa thành công";
    redirectAdmin("news");
} else {
    $_SESSION['error'] = "Xóa thất bại";
}
?>
