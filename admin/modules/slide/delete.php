<?php 
     require "../../autoload/autoload.php";
    
     require "../../layouts/head.php";

     $slide = new Database();
     $id = $_GET['id'];
     $slide_info = $slide->fetchID('slides', $id);
     $path="../../../public/uploads/slides/".$slide_info["image"];
     if (file_exists($path)) {
         unlink($path);
     }
   
        $result = $slide->delete("slides", $id);

        if (isset($result)) {
              $_SESSION['success'] = "Xóa thành công";
              redirectAdmin("slide");
          } else {
              $_SESSION['error'] = "Xóa thất bại";
          }
  

?>
