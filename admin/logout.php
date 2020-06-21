<?php
    session_start();
    
    unset($_SESSION['user_name']);
	unset($_SESSION['level']);
	unset($_SESSION['user_id']);
	
    setcookie("admin","",time()-3600);
    setcookie("pass","",time()-3600);
    header('Location: http://localhost:8080/doan/admin/login.php');
 ?>