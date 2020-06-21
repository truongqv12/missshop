<?php if (!isset($_SESSION['user_name'])) {
    header('Location: '.base_url().'admin/login.php');
} ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Miss Shop | Manager</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/dist/css/skins/_all-skins.min.css">
  <script src="<?php echo base_url() ?>public/admin/bower_components/jquery/dist/jquery.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
  <script type="text/javascript" src="<?php echo base_url() ?>public/plugin/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>public/admin/css/mystyle.css">
  <link rel="shortcut icon" href="<?php base_url() ?>../public/frontend/images/missshop_url.png" type="image/gif" > 



  <!-- Google Font -->
</head>