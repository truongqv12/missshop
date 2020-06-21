<?php 

$open = "admin";
require "../../autoload/autoload.php";
$db = new Database();
require "../../layouts/head.php";
$id = getInput('id');

if ($_SESSION['level'] != 1 || $_SESSION['user_id'] == $id) {
    echo "<script>alert('Bạn không có quyền thực hiện  chức năng này');location.href='".base_url()."admin/modules/admin/'</script>";
} else {
    $result = $db->delete('admin', $id);
    if (isset($result)) {
        $_SESSION['success'] = "Xóa thành công";
        redirectAdmin("admin");
    } else {
        $_SESSION['error'] = "Xóa thất bại";
    }
    redirectAdmin("admin");
}
   

?>