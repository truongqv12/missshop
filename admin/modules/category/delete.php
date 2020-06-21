<?php 
     require "../../autoload/autoload.php";
    
     require "../../layouts/head.php";

     $cate = new Database();
     $id = $_GET['id'];

        $result = $cate->delete("Categories", $id);
        if (isset($result)) {
              $_SESSION['success'] = "Xóa thành công";
              redirectAdmin("category");
          } else {
              $_SESSION['error'] = "Xóa thất bại";
            redirectAdmin("category");
          }



?>
